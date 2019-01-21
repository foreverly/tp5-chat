<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\index\model\Article;

class IndexController extends Common
{

    protected $needLogin = false;

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('lw-index', [
            'article_list' => $this->getArticles(),
            'rotation_list' => $this->getRotations()
        ]);
    }
    
    public function info()
    {
        echo phpinfo();
    }

    /*
    * 获取文章列表
    * 模拟
    * author：Bruce
    */
    public function getArticles()
    {
        $res = Db::table('article')->limit(5)->select();

        $article_list = [];
        foreach ($res as $key => $value) {
            $article_list[] = [
                'title' => $value['title'],
                'url' => '/article/info?id=' . $value['id'],
                'cover_picture' => $value['cover_image'],
                'slogan' => $value['slogan'],
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => $value['created_time']
            ];
        }
        return $article_list;
    }

    /*
    * 获取轮播列表
    * 模拟
    * author：Bruce
    */
    public function getRotations()
    {
        $res = Db::table('banner')->where('status', 1)->limit(3)->select();

        $banner_list = [];
        foreach ($res as $key => $value) {
            $banner_list[] = [
                'picture' => $value['img_url'],
                'title' => $value['title'],
                'slogan' => $value['sub_title'],
                'author' => '',
            ];
        }

        return $banner_list;
    }
}
