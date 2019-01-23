<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Tag extends Model
{
    protected $pk = 'id';

    protected $table = 'tag';

    public function getTags($where = [], $limit = 10, $page = 1)
    {
        $offset = ($page - 1)*$limit;
        $tag_list = Db::table($this->table)
                        ->where($where)
                        ->limit($offset, $limit)
                        ->orderRaw('num desc')
                        ->select();

        return $tag_list;
    }
}

?>