<?php
namespace app\blog\model;

use think\Model;

class ContactModel extends Model
{
    protected $pk = 'id';

    // 设置当前模型对应的完整数据表名称
    protected $table = 'contact';
}