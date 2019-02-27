<?php
namespace wechat;

use lib\base\Curl;
use lib\weather\HeFeng;
use lib\life\Cookbook;

/**
  * wechat php api
  */
class WechatCallbackApi
{
    private $token = '';

    public function __construct($token = '')
    {
        $this->token = $token;
    }

	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }else{
            echo 'success';
            exit;
        }
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		// $token = TOKEN;
		$tmpArr = array($this->token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

    public function responseMsg()
    {
        // $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        // 因为一般PHP中register_globals参数都设置了On，禁止了使用$GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr = file_get_contents("php://input");

        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);

            switch ($RX_TYPE) {
                // 当回复公众号图片时
                case 'image':
                    $resultStr = $this->handleImage($postObj);
                    break;
                // 当回复公众号关键字时
                case 'text':
                    $resultStr = $this->handleText($postObj);
                    break;
                // 关注公众号事件
                case 'event':
                    $resultStr = $this->handleEvent($postObj);
                    break;                
                default:
                    $resultStr = "Unknow msg type: ".$RX_TYPE;
                    break;
            }
        }else{
            echo 'success';exit;
        }
    }

    // 回复图片消息
    private function handleImage($object)
    {
        $img_list = Db::name("article")->where("pass",'yes')->order('px asc')->limit(8)->select();

        $content = array();
        if (isset($img_list) && !empty($img_list)) {
            foreach ($img_list as $key => $item) {
                $content[] = [
                    'Title' => $item['article_name'],
                    'Description' => $item['article_desc'],
                    'PicUrl' => "http://域名/" . $item['article_img'],
                    'Url' => "http://域名/" . Url::build('home/article/index',"id=".$item['id']),
                ];
            }
        }

        $itemTpl = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
        </item>";

        $item_str = "";
        // 多图文回复
        foreach ($content as $item) {
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }

        $xmlTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>%s</ArticleCount>
            <Articles>$item_str</Articles>
        </xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($content));
        echo $result;
    }
    
    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";

        if (!empty($keyword)) {
            $msgType = "text";

            // 末尾是天气则查询实时天气
            if ($keyword !== '天气' && mb_substr($keyword, -2) == '天气') {
                $location = str_replace('天气', '', $keyword);
                $contentStr = (new HeFeng())->getWeather($location);
            }
            elseif($keyword !== '天气预报' && mb_substr($keyword, -4) == '天气预报'){
                $location = str_replace('天气预报', '', $keyword);
                $contentStr = (new HeFeng())->getForecast($location);                
            }
            elseif(mb_substr($keyword, -2) == '菜谱'){
                if ($keyword == '菜谱') {
                    $contentStr = "输入【XX菜谱】查询详细菜谱~如【梅菜扣肉菜谱】。";
                }else{
                    $menu_name = str_replace('菜谱', '', $keyword);
                    $contentStr = Cookbook::getMenu($menu_name);
                }               
            }
            else{
                switch ($keyword) {
                    case '天气':
                        $contentStr = "请输入【XX天气】查询实时天气状况哦~如【北京天气】。\n请输入【XX天气预报】查询未来几天的天气状况哦~如【北京天气预报】。";
                        break;
                    case '音乐':
                        $contentStr = '陈奕迅的歌很好听哦~';
                        break; 
                    case '我爱你':
                        $contentStr = '爱你哦~';
                        break;                
                    default:
                        $contentStr = "请输入【XX天气】查询实时天气状况哦~如【北京天气】。\n请输入【XX天气预报】查询未来几天的天气状况哦~如【北京天气预报】。";
                        break;
                }
            }

            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }
    }

    public function handleEvent($object)
    {
        $contentStr = "";
        $keyArray = explode("_", $object->EventKey);
        $EventKey = $object->EventKey;
        $FromUserName = $object->FromUserName;
        $key_count = count($keyArray);

        switch ($object->Event) {
            // 首次关注
            case 'subscribe':
                $contentStr = "嘻嘻，欢迎关注吾爱学。\n\n<a href='http://www.52xue.site'>一起来学习吧~</a>";
                break;
            // 已关注
            case 'SCAN':
                $contentStr = "嗨，老朋友，欢迎回来！\n每天起床第一句，先给自己打个气：今天也要好好学习哦~\n\n<a href='http://www.52xue.site'>开始学习</a>";
                break;            
            default:
        }

        $resultStr = $this->responseText($object, $contentStr);
        echo $resultStr;
    }

    public function responseText($object, $content, $flag = 0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        echo $resultStr;
    }

    public static function getAccessToken($appid, $app_secret)
    {        
        $curlData = [
            'grant_type' => 'client_credential',
            'appid' => $appid,
            'secret' => $app_secret
        ];

        $curlUrl = 'https://api.weixin.qq.com/cgi-bin/token?' . http_build_query($curlData);

        $res = Curl::get($curlUrl);

        $data = json_decode($res, true);

        if (!empty($data['errcode'])) {
            return $data['errmsg'];
        }

        return $data['access_token'];
    }
}

?>