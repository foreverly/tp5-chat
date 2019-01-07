<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;
use app\admin\model\PictureModel;

class Picture extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('admin-gallery', [
            // 
        ]);
    }
    
    public function sucai()
    {
        $page = $this->request->get('page', 1);
        $size = $this->request->get('size', 18);

        $picture_list = PictureModel::getPictures();

        // $picture_html = Paginator

        return $this->fetch('admin-gallery', [
            'picture_list' => array_slice($picture_list, 0, $size),
            'page' => $page,
            'size' => $size,
            'total' => count($picture_list)
        ]);
    }
    
    public function list()
    {
        $page = $this->request->post('page', 1);
        $size = $this->request->post('size', 18);

        $picture_list = PictureModel::getPictures();

        // $picture_html = Paginator

        ajaxSuccess([
            'picture_list' => array_slice($picture_list, 0, $size),
            'page' => $page,
            'size' => $size,
            'total' => count($picture_list)
        ]);
    }
}