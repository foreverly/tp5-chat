<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use lib\Pager;
use lib\Email;
use app\admin\model\Tag;
use app\admin\model\Article;
use app\admin\model\ArticleCategory;

class ArticleController extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        $curPage = (int)$this->request->get('page', 1) ?: 1;
        $type = (int)$this->request->get('type', 4) ?: 4;
        $pageSize = 10;
        
        $options = [
            'page' => $curPage,
            'query' => request()->param(),
            'type' => 'lib\Pager',
            'path' => url('/article', '', false),
            'var_page'  => 'page'
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        if (!empty($type)) {
            $where['type'] = $type;
        }

        // $article_list = Article::all($where)->toArray();
        $article_list = Db::table('article')->where($where)->order(['id'=>'desc'])->paginate(
            $pageSize, 
            false, 
            $options
        );

        $where = ['pid' => 0];
        $parent_category_list = ArticleCategory::all($where)->toArray();
        
        // $Pager = new Pager($article_list, $pageSize, $curPage, count($article_list), false, $options);

        return $this->fetch('index', [
            'article_list' => $article_list,
            'parent_category_list' => $parent_category_list,
            'type' => $type,
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
                $this->error('该文章不存在','/article');
            }

            $article_info = $articleModel->toArray();
            $article_info['content'] = htmlspecialchars_decode($article_info['content']);
            $article_info['category_list'] = explode(';', $article_info['category']);

            // 子类
            $child_category_list = ArticleCategory::all(['pid' => $article_info['type']])->toArray();
        }

        $category_list = ArticleCategory::all(['pid' => 0])->toArray();

        return $this->fetch('edit', [
            'category_list' => $category_list,
            'child_category_list' => $child_category_list ?? [],
            'type' => $article_info['type'] ?? '',
            'article_info' => $article_info
        ]);
    }

    public function getCategories()
    {
        $pid = intval($this->request->post('pid'));
        $res = ArticleCategory::all(['pid' => $pid])->toArray();
        // $category_list = [];
        // foreach ($res as $key => $value) {
        //     if ($value['pid'] == 0) {
        //         $category_list[$value['id']] = $value;
        //     }else{
        //         $category_list[$value['pid']]['child'][] = $value;
        //     }
        // }

        $category_list = $res ?: [];

        ajaxSuccess($category_list);
    }

    public function save()
    {
        $id                 = (int)$this->request->post('id', null);
        $author_id          = $this->userInfo['uid'];
        $title              = trim($this->request->post('title', ''));
        $sub_title          = trim($this->request->post('sub_title', ''));
        $desc               = trim($this->request->post('desc', ''));
        $push_time          = trim($this->request->post('push_time', date('Y-m-d H:i:s')));
        $slogan             = trim($this->request->post('slogan', ''));
        $cover_image        = trim($this->request->post('cover_image', ''));
        $seo_keywords       = trim($this->request->post('seo_keywords', ''));
        $category           = trim($this->request->post('category', 'default'));
        $content            = $this->request->post('content', '');
        $status             = (int)$this->request->post('status', 1);
        $type               = (int)$this->request->post('type', 0);
        $category_id        = (int)$this->request->post('category_id', 0);
        $hot                = $this->request->post('hot', '') == 'on' ? 1 : 0;
        $index              = $this->request->post('index', '') == 'on' ? 1 : 0;

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

        $model->author_id       = $author_id;
        $model->title           = $title;
        $model->sub_title       = $sub_title;
        $model->desc            = $desc;
        $model->hot             = $hot;
        $model->index           = $index;
        $model->slogan          = $slogan;
        $model->cover_image     = $cover_image;
        $model->seo_keywords    = $seo_keywords;
        $model->type            = $type;
        $model->category        = $category;
        $model->category_id     = $category_id;
        $model->content         = htmlspecialchars($content);

        $model->save();

        // 更新标签热度
        $tag_list = explode(';', $category);
        foreach ($tag_list as $key => $tag) {
            if ($tagModel = Tag::get(['name' => $tag])) {
                $tagModel->num += 1;
            }else{
                $tagModel = new Tag();
                $tagModel->name = $tag;
                $tagModel->num = 1;
                $tagModel->value = '';                
            }

            $tagModel->save();
        }

        ajaxSuccess();
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证

        $model = Article::get($id);

        if (!$model) {
            $this->error('该文章不存在','/article');
        }

        if ($model->delete()) {
            $this->success('删除成功','/article');
        }else{
            $this->error('删除失败','/article');
        }
    }
    
    public function list()
    {

        $banner_list = Article::all()->toArray();

        ajaxSuccess([
            'banner_list' => $banner_list
        ]);
    }

    public function changePram()
    {
        $id  = (int)$this->request->post('id', 0);
        $key = trim($this->request->post('key'));

        if (!in_array($key, ['index', 'hot', 'status'])) {
            ajaxError('未知的类型');
        }

        $model = Article::get($id);
        if ($model->$key == 1) {
            $model->$key = 0;
        }else{
            $model->$key = 1;
        }

        $model->save();

        ajaxSuccess();
    }
}