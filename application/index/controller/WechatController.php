<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use wechat\WechatCallbackApi;

define("TOKEN", "liangleyouwen");

class WechatController extends Controller
{
    public function _initialize()
    {
        // TO DO
    }

    public function volid()
    {    	
		$wechatObj = new WechatCallbackApi();
		$wechatObj->valid();
    }
}