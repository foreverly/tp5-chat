<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cache;
use think\Db;

class Game extends Common
{
	public function _initialize()
    {
        parent::_initialize();
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function index()
    {
        return $this->fetch('wuziqi', [
            //
        ]);
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function wuziqi()
    {
        return $this->fetch('wuziqi', [
            //
        ]);
    }
}