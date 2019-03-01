<?php
namespace app\admin\model;

use think\Model;
use think\Db;
use lib\life\Cookbook as Book;


class Cookbook extends Model
{
    protected $pk = 'id';

    protected $table = 'cookbook';

    /*
    * 获取菜谱列表
    * 
    * author：Bruce
    */
    public static function getCookbooks()
    {
        return self::all()->toArray();
    }

    public static function getMenu($menu_name = '')
    {
        $info = Db::table('cookbook')->where('title', 'like', "%{$menu_name}%")->order('request_num desc, like desc')->find();
        if (empty($info)) {
            (new Book())->getCookbooks($menu_name);
            $info = Db::table('cookbook')->where('title', 'like', "%{$menu_name}%")->order('request_num desc, like desc')->find();
        }

        return $info;
    }
}

?>