<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use lib\Pager;
use lib\Email;
use app\admin\model\Banner;

class BannerController extends Common
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
            'path' => url('/banner', '', false),
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        if (!empty($parent)) {
            $where = ['parent' => null];
        }
        
        $banner_list = Banner::all($where)->toArray();
        
        $Pager = new Pager($banner_list, $pageSize, $curPage, count($banner_list), false, $options);

        return $this->fetch('index', [
            'banner_list' => $banner_list,
            'pager' => $Pager->render()
        ]);
    }
    
    public function edit()
    {
        $id = (int)$this->request->get('id', null);

        $banner_info = [];
        if ($id) {
            $bannerModel = Banner::get($id);

            if (empty($bannerModel)) {
                $this->error('该菜单不存在','/admin.php/banner');
            }

            $banner_info = $bannerModel->toArray();
        }

        return $this->fetch('edit', [
            'banner_info' => $banner_info
        ]);
    }

    public function save()
    {
        $id = (int)$this->request->post('id', null);
        $name = $this->request->post('name', '');
        $parent = $this->request->post('parent', null) ?: null;
        $route = $this->request->post('route', '');
        $data = $this->request->post('data', 'circle-o');
        $order = (int)$this->request->post('order', 0);
        
        // 数据验证

        if ($id) {
            $model = Banner::get($id);
        }else{
            $model = new Banner();
        }

        $model->name = $name;
        $model->parent = $parent;
        $model->route = $route;
        $model->data = $data;
        $model->order = $order;

        $model->save();

        ajaxSuccess();
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证

        $model = Menu::get($id);

        if (!$model) {
            $this->error('该菜单不存在','/admin.php/menu');
        }

        if ($model->delete()) {
            $this->success('删除成功','/admin.php/menu');
        }else{
            $this->error('删除失败','/admin.php/menu');
        }
    }
    
    public function list()
    {

        $menu_list = Menu::all(['pid' => null])->toArray();

        ajaxSuccess([
            'menu_list' => $menu_list
        ]);
    }
}