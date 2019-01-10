<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;
use app\admin\model\Menu;

class MenuController extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('index', [
            
        ]);
    }
    
    public function edit()
    {
        return $this->fetch('edit', [
            
        ]);
    }

    public function save()
    {
        $id = (int)$this->request->post('id', null);
        $name = $this->request->post('name', '');
        $parent = $this->request->post('parent', null);
        $route = $this->request->post('route', '');
        $data = $this->request->post('data', 'circle-o');
        $order = (int)$this->request->post('order', 0);

        // 数据验证

        if ($id) {
            $model = Menu::get($id);
        }else{
            $model = new Menu();
        }

        $model->name = $name;
        $model->parent = $parent;
        $model->route = $route;
        $model->data = $data;
        $model->order = $order;

        $model->save();

        ajaxSuccess();
    }
    
    public function list()
    {

        $menu_list = Menu::all(['pid' => null]);
var_dump($menu_list);exit;
        ajaxSuccess([
            'menu_list' => $menu_list
        ]);
    }
}