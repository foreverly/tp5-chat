<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Common
{

    protected $needLogin = true;

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('admin-index', [
            // 
        ]);
    }
}