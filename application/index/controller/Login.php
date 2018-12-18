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

        if ($user_info['password'] != pwdCrypt($password)) {
        	return ajaxError('密码错误');
        }

        // 用户登录成功后操作存储用户信息
        $user_data = [
            'uid' => $user_info['id'],
            'user_name'=> $user_info['username'],
            'nick_name'=>$user_info['display_name'],
            'my_sign'=>$user_info['my_sign'],
            'email'=>$user_info['email'],
            'head_url'=>$user_info['head_url'],
        ];

        Session::set('USER_INFO_SESSION', $user_data);
        Session::set('is_login', 1);

        return ajaxSuccess();
    }

    public function register()
    {
    	$post_data = Request::instance()->post();
    	$user_name = trim($post_data['userName']);

    	if (User::where('username', $user_name)->count() > 0) {
        	return ajaxError('该用户名已注册');
        }
    	
    	$model = new User();

    	$model->username = $user_name;
    	$model->display_name = trim($post_data['nickName']);
    	$model->real_name = 'default';
    	$model->email = $post_data['email'] ?? '';
    	$model->password = pwdCrypt(trim($post_data['loginPwd']));
    	$model->head_url = '/static/chat/img/avatar04.png';
    	$model->created_at = time();

    	$model->save();
        
        return ajaxSuccess();
    }
}
