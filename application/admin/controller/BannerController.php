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
                $this->error('该菜单不存在','/banner');
            }

            $banner_info = $bannerModel->toArray();
        }

        return $this->fetch('edit', [
            'banner_info' => $banner_info
        ]);
    }

    public function save()
    {
        $id         = (int)$this->request->post('id', null);
        $title      = trim($this->request->post('title', ''));
        $sub_title  = trim($this->request->post('sub_title', ''));
        $desc       = trim($this->request->post('desc', ''));
        $img_url    = trim($this->request->post('img_url', ''));
        $url        = trim($this->request->post('url', ''));
        $order      = (int)$this->request->post('order', 0);
        $status     = (int)$this->request->post('status', 0);
        
        // 数据验证
        if (empty($img_url)) {
            ajaxError('请上传图片');
        }

        if ($id) {
            $model = Banner::get($id);
            $model->updated_time = date('Y-m-d H:i:s');
        }else{
            $model = new Banner();
            $model->created_time = date('Y-m-d H:i:s');
        }

        $model->title       = $title;
        $model->sub_title   = $sub_title;
        $model->desc        = $desc;
        $model->img_url     = $img_url;
        $model->url         = $url;
        $model->order       = $order;
        $model->status      = $status;        

        $model->save();

        ajaxSuccess();
    }

    public function del()
    {
        $id = (int)$this->request->get('id', null);
        
        // 数据验证

        $model = Banner::get($id);

        if (!$model) {
            $this->error('该轮播图不存在','/banner');
        }

        if ($model->delete()) {
            $this->success('删除成功','/banner');
        }else{
            $this->error('删除失败','/banner');
        }
    }
    
    public function list()
    {

        $banner_list = Banner::all()->toArray();

        ajaxSuccess([
            'banner_list' => $banner_list
        ]);
    }
}