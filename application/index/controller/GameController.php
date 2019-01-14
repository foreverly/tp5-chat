<?php
namespace app\index\controller;

use think\Controller;

class GameController extends Common
{
	public function _initialize()
    {
        // parent::_initialize();
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