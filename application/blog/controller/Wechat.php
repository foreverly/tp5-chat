<?php
namespace app\blog\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use wechat\WechatCallbackApi;

define("TOKEN", "liangleyouwen");

class Wechat extends Controller
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