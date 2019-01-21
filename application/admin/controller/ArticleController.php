<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use lib\Pager;
use lib\Email;
use app\admin\model\Article;

class ArticleController extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        $curPage = (int)$this->request->get('page', 1) ?: 1;
        $pageSize = 5;
        
        $options = [
            'page' => $curPage,
            'query' => request()->param(),
            'type' => 'lib\Pager',
            'path' => url('/article', '', false),
            'var_page'  => 'page'
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        if (!empty($parent)) {
            $where = ['parent' => null];
        }
        
        // $article_list = Article::all($where)->toArray();
        $article_list = Db::table('article')->where($where)->order(['id'=>'desc'])->paginate(
            $pageSize, 
            false, 
            $options
        );
        
        // $Pager = new Pager($article_list, $pageSize, $curPage, count($article_list), false, $options);

        return $this->fetch('index', [
            'article_list' => $article_list,
            'pager' => $article_list->render()
        ]);
    }
    
    public function edit()
    {
        $id = (int)$this->request->get('id', null);

        $article_info = [];
        if ($id) {
            $articleModel = Article::get($id);

            if (empty($articleModel)) {
                $this->error('该文章不存在','/admin.php/article');
            }

            $article_info = $articleModel->toArray();
            $article_info['content'] = htmlspecialchars_decode($article_info['content']);
        }       

        return $this->fetch('edit', [
            'article_info' => $article_info
        ]);
    }

    public function save()
    {
        $id             = (int)$this->request->post('id', null);
        $author_id      = $this->userInfo['uid'];
        $title          = trim($this->request->post('title', ''));
        $sub_title      = trim($this->request->post('sub_title', ''));
        $desc           = trim($this->request->post('desc', ''));
        $push_time      = trim($this->request->post('push_time', date('Y-m-d H:i:s')));
        $slogan         = trim($this->request->post('slogan', ''));
        $cover_image    = trim($this->request->post('cover_image', ''));
        $seo_keywords   = trim($this->request->post('seo_keywords', ''));
        $category       = trim($this->request->post('category', 'default'));
        $content        = $this->request->post('content', '');
        $status         = (int)$this->request->post('status', 0);
        
        // 数据验证
        if (empty($cover_image)) {
            ajaxError('请上传封面图片');
        }

        if ($id) {
            $model = Article::get($id);
            $model->updated_time = date('Y-m-d H:i:s');
        }else{
            $model = new Article();
            $model->status = $status;
            $model->push_time = $push_time;
            $model->created_time = date('Y-m-d H:i:s');
        }

        $model->author_id   = $author_id;
        $model->title       = $title;
        $model->sub_title   = $sub_title;
        $model->desc        = $desc;
        $model->slogan      = $slogan;
        $model->cover_image = $cover_image;
        $model->seo_keywords= $seo_keywords;
        $model->category    = $category;
        $model->content     = htmlspecialchars($content);        
                

        $model->save();

        ajaxSuccess();
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证

        $model = Article::get($id);

        if (!$model) {
            $this->error('该文章不存在','/admin.php/article');
        }

        if ($model->delete()) {
            $this->success('删除成功','/admin.php/article');
        }else{
            $this->error('删除失败','/admin.php/article');
        }
    }
    
    public function list()
    {

        $banner_list = Article::all()->toArray();

        ajaxSuccess([
            'banner_list' => $banner_list
        ]);
    }
}