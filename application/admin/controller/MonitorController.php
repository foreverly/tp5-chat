<?php
namespace app\admin\controller;

use think\Controller;
use think\Cache;
use lib\base\Curl;

/**
 * 和风天气
 */
class MonitorController extends Common
{
    protected $needLogin = false;

    public function _initialize()
    {
        parent::_initialize();
    }

    public function updateCookbooks()
    {
        $keyword = $this->request->get('keyword', '');
        $update = $this->request->get('update', false);

        (new Cookbook())->getCookbooks($keyword, $update);
    }

    public function monitorCookbooks()
    {
        $keyword = $this->request->get('keyword', '');
        $update = $this->request->get('update', false);

        // while()
        Cache::store('redis')->push("LIFE_COOKBOOK_NEED_UPDATE", $menu);

        (new Cookbook())->getCookbooks($keyword, $update);
    }
}