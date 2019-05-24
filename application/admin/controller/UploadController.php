<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class UploadController extends Common
{

    protected $needLogin = true;

    public function _initialize()
    {
        parent::_initialize();
    }

    public function uploadPic()
    {
        $file = request()->file("images");
        $type = request()->post("type", 'default');

        $base_path = ROOT_PATH.'public/static/upload';

        if (!file_exists($base_path.'/'.$type)) {
            mkdir($base_path.'/'.$type, 0777, true);
        }

        $info = $file->move($base_path.'/'.$type);//图片保存路径
        $img_url = '/static/upload/' . $type . '/' . str_replace('\\', '/', $info->getSaveName());

        if ($info) {
            return ajaxSuccess(['img_url' => $img_url]);
        }else{
            return ajaxError('上传失败！');
        }
    }
}