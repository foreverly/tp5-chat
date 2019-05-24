<?php
namespace app\index\model;

use think\Model;

class UserBackend extends Model
{
    protected $pk = 'id';

    protected $table = 'user_backend';

    public static function getName($uid)
    {
    	return User::get($uid)->display_name;
    }
}