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

    public function responseMsg()
    {
        (new WechatCallbackApi)->responseMsg();
    }
}