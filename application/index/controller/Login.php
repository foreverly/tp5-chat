<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{

    public function _initialize()
    {
        // TO DO
    }
    
    public function index()
    {
    	return $this->fetch('index');
    }
}
