<?php
namespace app\blog\controller;

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
        $this->userInfo = Session::get('USER_INFO_SESSION') ?? [];
        $this->isLogin = Session::get('is_login');
        // $this->checkLogin();
    }

    protected function checkLogin()
    {
    	if (!$this->isLogin) {
    		$this->redirect(url('/login'));
    	}
    }
}