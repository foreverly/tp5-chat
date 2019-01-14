<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cache;
use think\Db;
use app\index\model\Article;

class ArticleController extends Common
{

    protected $needLogin = false;

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
        return $this->fetch('list', [
            //
        ]);
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function info()
    {
        return $this->fetch('lw-article', [
            //
        ]);
    }
}