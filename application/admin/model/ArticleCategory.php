<?php
namespace app\admin\model;

use think\Model;

class ArticleCategory extends Model
{
    protected $pk = 'id';

    protected $table = 'article_category';

    /*
    * 获取分类列表
    * 
    * author：Bruce
    */
    public static function getCategories()
    {
        self::all()->toArray();
    }
}

?>