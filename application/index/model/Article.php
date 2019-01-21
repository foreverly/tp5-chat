<?php
namespace app\index\model;

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
        $list = self::all()->toArray();
        foreach ($list as $key => $value) {
            $list[$key]['content'] = htmlspecialchars_decode($value['content']);
        }

        return $list;
    }
}

?>