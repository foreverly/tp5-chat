<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class IndexController extends Common
{

    protected $needLogin = true;

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        // admin-
        return $this->fetch('index', [
            'type' => $this->request->get('type', 'sucai')
        ]);
    }
}