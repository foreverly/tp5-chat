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

    // public function responseMsg()
    // {
    //     (new WechatCallbackApi)->responseMsg();
    // }
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
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
                if(!empty( $keyword ))
                {
                    $msgType = "text";
                    $contentStr = "感谢关注!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }else{
                    echo "Input something...";
                }

        }else {
            echo "";
            exit;
        }
    }
}