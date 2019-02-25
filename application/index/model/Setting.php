<?php
namespace app\index\model;

use think\Model;
use lib\helpers\ArrayHelper;

class Setting extends Model
{
    protected $pk = 'id';

    // 设置当前模型对应的完整数据表名称
    protected $table = 'website_setting';

    public static function getSettings()
    {
    	$list = self::all()->toArray();
        return ArrayHelper::map($list, 'name', 'value');
    }
}