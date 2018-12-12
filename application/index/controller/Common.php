<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;

class Common extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        $this->checkLogin();
    }

    private function checkLogin()
    {
    	$is_login = Session::get('is_login') ? true : false;

    	if (!$is_login) {
    		$this->redirect(url('/login'));
    	}
    }
}
