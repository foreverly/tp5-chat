<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use wechat\WechatCallbackApi;
use lib\helpers\ArrayHelper;

class WechatController extends Controller
{
	private $Token = '52xue';
    private $AppID = '';
    private $AppSecret = '';
    private $EncodingAESKey = '';

    public function _initialize()
    {
    	// 取出配置表里的token
        $wechatSettings = Db::table('website_setting')->where(['type' => 'wechat'])->select();

        foreach ($wechatSettings as $setting) {
            $keyStr = substr($setting['name'], 7);
            if (!empty($setting['value'])) {                
                $this->$keyStr = $setting['value'];
            }            
        }
    }

    public function index(){
        if(!isset($_GET["echostr"])){ 
            $this->responseMsg(); 
        }else{
            $this->valid();
        }
    }

    /*
    * 获取access_token
    */
    private function getAccessToken()
    {
        return WechatCallbackApi::getAccessToken($this->AppID, $this->AppSecret);
    }

    public function valid()
    {
		$wechatObj = new WechatCallbackApi($this->Token);
		$wechatObj->valid();
    }
 
    public function responseMsg(){
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //extract post data
        if (!empty($postStr)){
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);
 
                switch($RX_TYPE){
                    //当回复公众号图片时
                    case "image":
                        $resultStr = $this->handleImage($postObj);
                        break;
                    //当回复公众号关键字时
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    //关注公众号事件
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }
 
    //回复图片消息
    private function handleImage($object)
    {
        $img_list = Db::name("article")->where("pass",'yes')->order('px asc')->limit(8)->select();
 
        $content = array();
        if(isset($img_list) && !empty($img_list)){
            foreach($img_list as $key=>$item){
                $content[] = array(
                        "Title"=>$item['article_name'], 
                        "Description"=>$item['article_desc'], 
                        "PicUrl"=>"http://域名/".$item['article_img'], 
                        "Url" =>"http://域名/".Url::build('home/article/index',"id=".$item['id'])
                    );
            }
        }
 
        $itemTpl = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
        </item>";
        $item_str = "";
        //多图文回复
        foreach ($content as $item){
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
        return $result;
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
        if(!empty( $keyword )){
            $msgType = "text";
            if($keyword == '1'){
                $contentStr = '关键字回复1';
            }elseif($keyword == '2'){
                $contentStr = '关键字回复2';
            }
 
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }
    }
 
    public function handleEvent($object){
        $contentStr = "";
        $keyArray = explode("_", $object->EventKey);
        $EventKey = $object->EventKey;
        $FromUserName = $object->FromUserName;
        $key_count = count($keyArray);
      
        switch ($object->Event){
            //首次关注
            case "subscribe":
                $contentStr = "嘻嘻，欢迎关注优倍素材网";
            break;
            //已关注
            case "SCAN":
                $contentStr = "嗨，老朋友，欢迎回来";
            break;
            default :
        }
 
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function responseText($object, $content, $flag=0)
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
        return $resultStr;
    }
}