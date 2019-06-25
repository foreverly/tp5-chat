<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use lib\Pager;
use lib\Email;
use app\admin\model\ArticleCategory;

class CategoryController extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        $curPage = (int)$this->request->get('page', 1) ?: 1;
        $pageSize = 10;

        $options = [
            'page' => $curPage,
            'path' => url('/category', '', false),
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        // 
        
        $category_list = ArticleCategory::all($where)->toArray();

        $Pager = new Pager($category_list, $pageSize, $curPage, count($category_list), false, $options);

        return $this->fetch('index', [
            'category_list' => $category_list,
            'pager' => $Pager->render()
        ]);
    }
    
    public function edit()
    {
        $id = (int)$this->request->get('id', null);

        $where = ['pid' => 0];
        $parent_category_list = ArticleCategory::all($where)->toArray();
        
        $category_info = [];
        if ($id) {
            $categoryModel = ArticleCategory::get($id);

            if (empty($categoryModel)) {
                $this->error('该菜单不存在','/category');
            }

            $category_info = $categoryModel->toArray();
        }

        return $this->fetch('edit', [
            'parent_category_list' => $parent_category_list,
            'category_info' => $category_info
        ]);
    }

    public function save()
    {
        $id             = (int)$this->request->post('id', null);
        $pid            = (int)$this->request->post('pid', 0);
        $category_name  = trim($this->request->post('category_name', ''));
        $status         = (int)$this->request->post('status', 1);
        
        try {
            if ($id) {
                $model = ArticleCategory::get($id);
            }else{
                $model = new ArticleCategory();
            }

            $model->pid             = $pid;
            $model->category_name   = $category_name;
            $model->status          = $status;        

            $model->save();

            ajaxSuccess();
        } catch (\Exception $e){
            ajaxError($e->getMessage());
        }                    
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证
        $model = ArticleCategory::get($id);

        if (!$model) {
            $this->error('该标签不存在','/category');
        }

        if ($model->delete()) {
            $this->success('删除成功','/category');
        }else{
            $this->error('删除失败','/category');
        }
    }
    
    public function list()
    {
        $category_list = ArticleCategory::all()->toArray();

        ajaxSuccess([
            'category_list' => $category_list
        ]);
    }

    public function doSearch()
    {
        $keyword = trim($this->request->post('keyword', ''));
        $current = trim($this->request->post('current', ''));
        $current = explode(';', $current);

        // 闭包查询
        $category_list = Db::table('category')->select(function ($query) use ($keyword, $current)
        {
            if ($current != '') {
                $query->where('name', 'not in', $current);
            }

            if ($keyword != '') {
                $query->where('name', 'like', "%{$keyword}%");
            }

            $query->order("num desc");
        });

        ajaxSuccess($category_list);
    }
}