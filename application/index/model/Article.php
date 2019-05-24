<?php
namespace app\index\model;

use think\Model;
use think\Db;

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
    // public static function getArticles()
    // {
    //     $list = self::all()->toArray();
    //     foreach ($list as $key => $value) {
    //         $list[$key]['content'] = htmlspecialchars_decode($value['content']);
    //     }

    //     return $list;
    // }

    /*
    * 获取文章列表
    * 模拟
    * author：Bruce
    */
    public function getArticles($where = [], $curPage = 1, $pageSize = 5)
    {
        $offset = (($curPage) < 1 ? 0 : ($curPage - 1)) * $pageSize;
        $limit  = $pageSize;

        $res = Db::table('article')->where($where)->orderRaw('created_time desc')->limit($offset, $limit)->select();

        $article_list = [];
        foreach ($res as $key => $value) {
            $article_list[] = [
                'title' => $value['title'],
                'url' => '/article/info?id=' . $value['id'],
                'cover_picture' => $value['cover_image'],
                // 'slogan' => $value['slogan'] ?: cutStr(htmlspecialchars_decode($value['content']), 212, '...'),
                'slogan' => $value['slogan'],
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => $value['created_time']
            ];
        }
        return $article_list;
    }

    /*
    * 获取热门文章
    * 
    * author：Bruce
    */
    public function getHots($where = [], $orderBy = 'hot desc', $limit = 10)
    {
        $res = Db::table('article')->where($where)->orderRaw($orderBy)->limit($limit)->select();

        $article_list = [];
        foreach ($res as $key => $value) {
            $article_list[] = [
                'title' => $value['title'],
                'url' => '/article/info?id=' . $value['id'],
            ];
        }

        return $article_list;
    }

    public function getCount($where = [])
    {
        return Db::table($this->table)->where($where)->count();
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