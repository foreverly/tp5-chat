<?php
namespace app\index\controller;

use think\Controller;

class RegisterController extends Controller
{
    public function _initialize()
    {
        // TO DO
    }
    
    public function index()
    {
    	return $this->fetch('lw-re');
    }
}