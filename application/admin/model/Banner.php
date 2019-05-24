<?php
namespace app\admin\model;

use think\Model;

class Banner extends Model
{
    protected $pk = 'id';

    protected $table = 'banner';

    /*
    * 获取Banner列表
    * 
    * author：Bruce
    */
    public static function getBanners()
    {
        self::all()->toArray();
    }
}

?>