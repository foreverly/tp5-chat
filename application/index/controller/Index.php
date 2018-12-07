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
        return 'index';
    }
    
    public function hello()
    {
        return 'hello';
    }
    
    public function data()
    {
        return 'data';
    }
}
