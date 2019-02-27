<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use wechat\WechatCallbackApi;
use lib\helpers\ArrayHelper;
use lib\weather\HeFeng;
use lib\life\Cookbook;

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

    public function index()
    {
        $wechatObj = new WechatCallbackApi($this->Token);
        
        if (!isset($_GET['echostr'])) {
            $wechatObj->responseMsg();
        }else{
            $wechatObj->valid();
        }
    }

    public function updateCookbook()
    {
        $keyword = $_GET['keyword'];
        (new Cookbook())->getCookbooks($keyword);
    }
}