<?php
namespace app\index\model;

use think\Model;

class Contact extends Model
{
    protected $pk = 'id';

    // 设置当前模型对应的完整数据表名称
    protected $table = 'contact';
}