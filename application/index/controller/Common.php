<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        $this->checkLogin();
    }

    private function checkLogin()
    {
    	return true;
    }
}
