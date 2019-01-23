<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use lib\Pager;
use lib\Email;
use app\admin\model\Tag;

class TagController extends Common
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
            'path' => url('/tag', '', false),
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        if (!empty($parent)) {
            $where = ['parent' => null];
        }
        
        $tag_list = Tag::all($where)->toArray();
        
        $Pager = new Pager($tag_list, $pageSize, $curPage, count($tag_list), false, $options);

        return $this->fetch('index', [
            'tag_list' => $tag_list,
            'pager' => $Pager->render()
        ]);
    }
    
    public function edit()
    {
        $id = (int)$this->request->get('id', null);

        $tag_info = [];
        if ($id) {
            $tagModel = Tag::get($id);

            if (empty($tagModel)) {
                $this->error('该菜单不存在','/admin.php/tag');
            }

            $tag_info = $tagModel->toArray();
        }

        return $this->fetch('edit', [
            'tag_info' => $tag_info
        ]);
    }

    public function save()
    {
        $id         = (int)$this->request->post('id', null);
        $value      = trim($this->request->post('value', ''));
        $name       = trim($this->request->post('name', ''));
        $status     = (int)$this->request->post('status', 0);
        
        try{
            if ($id) {
                $model = Tag::get($id);
            }else{
                $model = new Tag();
            }

            $model->value       = $value;
            $model->name        = $name;
            $model->status      = $status;        

            $model->save();

            ajaxSuccess();
        }catch(\Exception $e)){
            ajaxError($model->error);
        }                    
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证
        $model = Tag::get($id);

        if (!$model) {
            $this->error('该标签不存在','/admin.php/tag');
        }

        if ($model->delete()) {
            $this->success('删除成功','/admin.php/tag');
        }else{
            $this->error('删除失败','/admin.php/tag');
        }
    }
    
    public function list()
    {

        $tag_list = Tag::all()->toArray();

        ajaxSuccess([
            'tag_list' => $tag_list
        ]);
    }
}