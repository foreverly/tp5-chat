<?php
namespace app\admin\model;

use think\Model;

class Setting extends Model
{
    protected $pk = 'id';

    protected $table = 'website_setting';

    /*
    * 获取设置列表
    * 
    * author：Bruce
    */
    public static function getSettings()
    {
        return self::all()->toArray();
    }
}

?>