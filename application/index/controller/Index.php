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
        echo "Hello gays";
    }
    
    public function info()
    {
        echo phpinfo();
    }
}
