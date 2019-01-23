<?php
namespace app\index\model;

use think\Model;

class Article extends Model
{
    protected $pk = 'id';

    protected $table = 'article';

    // 定义关联模型列表
    protected static $relationModel = [
        // 给关联模型设置数据表
        'User'  =>  'user_backend',
    ];

    protected $mapFields = [
        // 为混淆字段定义映射
        'id'        =>  'Article.id',
        'author_id' =>  'User.id',
    ];

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

    public function user()
    {
        /*
         * 参数一:关联的模型名
         * 参数二:关联的模型的id
         * 参数三:当前模型的关联字段
         * */
        return $this->hasOne('User','id','author_id');
    }

}