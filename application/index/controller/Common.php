<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\index\model\Tag;
use app\index\model\Menu;
use app\index\model\Article;
use app\index\model\Setting;

class Common extends Controller
{
	protected $userInfo = [];

    protected $isLogin = false;

    protected $needLogin = true;

    public function _initialize()
    {
        parent::_initialize();        
        $this->checkLogin();

        $this->assign([
            'menu_list' => Menu::getMenus($this->isLogin),
            'tag_list' => (new Tag())->getTags(['status' => 1]),
            'hot_articles' => (new Article())->getHots(['status' => 1, 'hot' => 1]),
            'is_login' => $this->isLogin,
            'settingInfo' => Setting::getSettings(),
            'user_info' => $this->userInfo
        ]);
    }

    //
    protected function checkLogin()
    {
        $this->isLogin = $this->isLogin();
    	if (!$this->isLogin && $this->needLogin) {
    		$this->redirect(url('/login'));
    	}else{
            $this->userInfo = Session::get('USER_INFO_SESSION') ?? [];            
        }
    }

    protected function isLogin()
    {
        return Session::get('is_login') ? true : false;
    }
}