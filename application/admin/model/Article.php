<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected $pk = 'id';

    protected $table = 'article';

    /*
    * 获取Article列表
    * 
    * author：Bruce
    */
    public static function getArticles()
    {
        return self::all()->toArray();
    }
}

?>