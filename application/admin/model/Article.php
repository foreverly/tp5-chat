<?php
namespace app\admin\model;

use think\Model;
use lib\life\Cookbook as Book;

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

    public static function getMenu($menu_name = '')
    {
        $info = Db::table('article')->where('title', 'like', "%{$menu_name}%")->order('hot desc')->find();
        if (empty($info)) {
            (new Book())->getCookbooks();
            $info = Db::table('article')->where('title', 'like', "%{$menu_name}%")->order('hot desc')->find();
        }

        return $info;
    }
}

?>