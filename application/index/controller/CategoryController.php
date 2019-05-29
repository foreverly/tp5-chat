<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Article;

class CategoryController extends Common
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
        // $list = Article::getArticles();
        
        return $this->fetch('list', [
            // 'article_list' => $list,
        ]);
    }

}