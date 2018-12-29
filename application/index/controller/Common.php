<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;

class Common extends Controller
{
	protected $userInfo = [];

	protected $isLogin = false;

    public function _initialize()
    {
        parent::_initialize();        
        $this->checkLogin();
    }

    protected function checkLogin()
    {
        $this->isLogin = $this->isLogin();
    	if (!$this->isLogin) {
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