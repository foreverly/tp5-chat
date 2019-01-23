<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Comment extends Model
{
    protected $pk = 'id';

    protected $table = 'comment';

    public function getComments($where = [])
    {
        // $comment_list = self::all($where);
        $comment_list = Db::table($this->table)
                        ->alias('c')
                        ->Join('user_backend u', 'c.uid = u.id')
                        ->field('c.*, u.display_name as name, u.head_url')
                        ->where($where)
                        ->orderRaw('c.id desc')
                        ->select();
                        // ->paginate(6, false, ['query' => request()->param(),'type' => 'page\Page','var_page'  => 'page']);

        foreach ($comment_list as $key => $comment) {
            $comment_list[$key]['name']     = $comment['name'] ?: '游客';
            $comment_list[$key]['head_url'] = $comment['head_url'] ?: '/static/chat/img/avatar04.png';               
        }

        return $comment_list;
    }

    public function user()
    {
        /*
         * 参数一:关联的模型名
         * 参数二:关联的模型的id
         * 参数三:当前模型的关联字段
         * */
        return $this->hasOne('UserBackend','id','uid')->field('id, display_name, head_url');
    }
}

?>