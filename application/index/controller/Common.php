<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\index\model\MenuModel;

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
            'menu_list' => MenuModel::getMenus($this->isLogin),
            'is_login' => $this->isLogin,
            'user_info' => $this->userInfo
        ]);
    }

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