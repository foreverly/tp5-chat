<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;

class LoginController extends Common
{
    protected $needLogin = false;

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {       
        return $this->fetch('login');
    }

    public function login()
    {
        $email = trim($this->request->post('email', ''));
        $password = trim($this->request->post('Password', ''));

        $user_info = Db::table('user_backend')
            ->where(['email' => $email])
            ->find();

        if (empty($user_info)) {
            return ajaxError('用户不存在');
        }
        
        if ($user_info['password_hash'] != pwdCrypt($password)) {
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
}