<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Index extends Common
{

    public function _initialize()
    {
        // TO DO
    }
    
    public function index()
    {
        $this->redirect(url('/chat'));
    }
    
    public function info()
    {
        echo phpinfo();
    }
}
