<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use app\index\model\User;

class Login extends Controller
{

    public function _initialize()
    {
        // TO DO
    }
    
    public function index()
    {
    	return $this->fetch('index');
    }

    public function registerUser()
    {
    	return $this->fetch('register');
    }

    public function login()
    {
    	$post_data = Request::instance()->post();
    	$username = trim($post_data['username']);
    	$password = trim($post_data['Password']);

    	$user_info = Db::table('user_backend')
        	->where(['username' => $username])
        	->find();

        if (empty($user_info)) {
        	return ajaxError('用户不存在');
        }

        if ($user_info['password'] != md5($password)) {
        	# code...
        }

        // 用户登录成功后操作存储用户信息
        $user_data = [
            'uid' => $user_info['id'],
            'user_name'=> $user_info['username'],
            'nick_name'=>$user_info['display_name'],
            'my_sign'=>$user_info['my_sign'],
            'head_url'=>$user_info['head_url'],
        ];

        Session::set('USER_INFO_SESSION', $user_data);
        Session::set('is_login', 1);

        return ajaxSuccess();
    }

    public function register()
    {
    	$post_data = Request::instance()->post();
    	
    	$model = new User();

    	$model->username = trim($post_data['userName']);
    	$model->display_name = trim($post_data['nickName']);
    	$model->password = trim($post_data['loginPwd']);
    	$model->head_url = '/static/chat/img/avatar04.png';
    	$model->created_at = time();
    	$model->save();
        
        return ajaxSuccess();
    }
}
