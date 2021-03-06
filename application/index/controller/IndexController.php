<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\index\model\Tag;
use app\index\model\Article;

class IndexController extends Common
{
    protected $needLogin = false;

    protected $page = 1;

    protected $size = 5;

    public function _initialize()
    {
        parent::_initialize();        
    }
    
    public function index()
    {
        $where = ["index" => 1];
        return $this->fetch('lw-index', [
            'article_list' => (new Article())->getArticles($where, $this->page, $this->size),
            'page' => $this->page,
            'totalPage' => ceil((new Article())->getCount($where)/$this->size),
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
        $page = (int)$this->request->post('page', 1);

        $where = '1=1';
        $article_list = (new Article())->getArticles($where, $page, $this->size);

        ajaxSuccess($article_list);
    }

    /*
    * 获取轮播列表
    * 模拟
    * author：Bruce
    */
    public function getRotations()
    {
        $res = Db::table('banner')->where('status', 1)->limit(3)->select();
        // $sql = "SELECT * FROM `banner` as t1 JOIN (SELECT ROUND(RAND() * (select max(`id`) from `banner`)) AS `id`) AS t2 WHERE t1.id >= t2.id AND status = 1 ORDER BY t1.id LIMIT 3";
        // $res = Db::query($sql); 

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

    /*
    * 获取标签列表
    * 模拟
    * author：Bruce
    */
    public function getTags()
    {
        $res = (new Tag())->getTags(['status' => 1]);

        $tag_list = [];
        foreach ($res as $key => $value) {
            $tag_list[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'url' => '#'
            ];
        }

        ajaxSuccess($tag_list);
    }
}
