<?php
namespace app\blog\controller;

use think\Controller;

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
