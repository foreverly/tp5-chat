<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use lib\Pager;
use lib\Email;
use app\admin\model\Menu;

class MenuController extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        $parent = (int)$this->request->get('parent', null) ?: null;
        $page = input('get.page');

        if (isset($page) && null !== $page) {
            $curPage = $page;
        }
        else {
            $curPage = 1;
        }

        $pageSize = 10;

        $options = [
            'page' => $curPage,
            'query' => request()->param(),
            'type' => 'lib\Pager',
            'path' => url('/menu', '', false),
            'var_page'  => 'page'
        ];

        $options = array_merge($options, config('pager.admin'));

        $where = [];
        if (!empty($parent)) {
            $where = ['parent' => $parent];
        }
        
        $father_menu_list = Menu::all(['parent' => null])->toArray();
        $menu_list        = Db::table('menu')->where($where)->order(['id'=>'desc'])->paginate(
            $pageSize, 
            false, 
            $options
        );

        // $bootstrap = new Pager($menu_list, $pageSize, $curPage, count($menu_list), false, $options);

        return $this->fetch('index', [
            'parent' => $parent,
            'menu_list' => $menu_list,
            'bootstrap' => $menu_list->render(),
            'father_menu_list' => $father_menu_list
        ]);
    }
    
    public function edit()
    {
        $id = (int)$this->request->get('id', null);

        $menu_info = [];
        if ($id) {
            $menuModel = Menu::get($id);

            if (empty($menuModel)) {
                $this->error('该菜单不存在','/menu');
            }

            $menu_info = $menuModel->toArray();
        }

        $menu_list = Menu::all(['parent' => null])->toArray();

        return $this->fetch('edit', [
            'menu_info' => $menu_info,
            'father_menu_list' => $menu_list,
        ]);
    }

    public function save()
    {
        $id     = (int)$this->request->post('id', null);
        $name   = $this->request->post('name', '');
        $parent = $this->request->post('parent', null) ?: null;
        $route  = $this->request->post('route', '');
        $data   = $this->request->post('data', 'circle-o');
        $order  = (int)$this->request->post('order', 0);
        $status = (int)$this->request->post('status', 1);
        
        // 数据验证

        if ($id) {
            $model = Menu::get($id);
        }else{
            $model = new Menu();
        }

        $model->name    = $name;
        $model->parent  = $parent;
        $model->route   = $route;
        $model->data    = $data;
        $model->order   = $order;
        $model->status  = $status;

        $model->save();

        ajaxSuccess();
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证

        $model = Menu::get($id);

        if (!$model) {
            $this->error('该菜单不存在','/menu');
        }

        if ($model->delete()) {
            $this->success('删除成功','/menu');
        }else{
            $this->error('删除失败','/menu');
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