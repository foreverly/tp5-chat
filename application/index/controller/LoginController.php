<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use app\index\model\UserBackend;

class LoginController extends Controller
{
    public function _initialize()
    {
        // TO DO
    }
    
    public function index()
    {
    	return $this->fetch('lw-log');
    }
}
