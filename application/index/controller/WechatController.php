<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use wechat\WechatCallbackApi;

class WechatController extends Controller
{
	private $wechatToken = '52xue';
    public function _initialize()
    {
    	// 取出配置表里的token
        $wechatToken = Db::table('website_setting')->where(['name' => 'wechat.Token'])->value('value');
        if (!empty($wechatToken)) {
        	$this->wechatToken = $wechatToken;
        }
    }

    public function volid()
    {
		$wechatObj = new WechatCallbackApi($this->wechatToken);
		$wechatObj->valid();
    }
}