<?php
namespace app\admin\model;

use think\Model;

class Tag extends Model
{
    protected $pk = 'id';

    protected $table = 'tag';

    /*
    * 获取Tag列表
    * 
    * author：Bruce
    */
    public static function getTags()
    {
        self::all()->toArray();
    }
}

?>