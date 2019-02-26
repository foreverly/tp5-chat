<?php
namespace wechat;

use lib\base\Curl;

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

            switch ($keyword) {
                case '天气':
                    $contentStr = '天气多云转晴，未来将有台风，准备放假哦~';
                    break;
                case '音乐':
                    $contentStr = '陈奕迅的歌很好听哦~';
                    break; 
                case '我爱你':
                    $contentStr = '爱你哦~';
                    break;                
                default:
                    $contentStr = '母鸡~';
                    break;
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
                $contentStr = "嘻嘻，欢迎关注吾爱学，一起来学习吧~\n<a href='www.52xue.site'>开始学习</a>";
                break;
            // 已关注
            case 'SCAN':
                $contentStr = "嗨，老朋友，欢迎回来！\n每天起床第一句，先给自己打个气：今天也要好好学习哦~\n<a href='www.52xue.site'>开始学习</a>";
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