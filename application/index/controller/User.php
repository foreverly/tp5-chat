<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Cache;
use lib\Email;
use think\Db;
use app\index\model\User as UserB;
use app\index\model\ContactModel;

class User extends Common
{

    public function _initialize()
    {
        // parent::_initialize();
    }
    
    public function profile()
    {
        $this->checkLogin();

        return $this->fetch('index', [
            'user_info' => $this->userInfo
        ]);
    }
    
    public function edit()
    {
        $uid = $this->userInfo['uid'];

        $user = UserB::get($uid);
        $user->display_name = request()->post('nickName');
        $user->head_url = request()->post('headUrl');
        $user->my_sign = request()->post('mySign');
        $user->email = request()->post('email');
        $user->updated_at = date('Y-m-d H:i:s');

        if ($user->save()) {
            $this->userInfo['nick_name'] = $user->display_name;
            $this->userInfo['head_url'] = $user->head_url;
            $this->userInfo['my_sign'] = $user->my_sign;
            $this->userInfo['email'] = $user->email;

            Session::set('USER_INFO_SESSION', $this->userInfo);

            return ajaxSuccess();
        }else{
            return ajaxError('保存失败');
        }
    }

    public function upload()
    {
        $file = request()->file("uploadImg");

        $base_path = ROOT_PATH.'public/static/upload';

        if (!file_exists($base_path.'/headImg')) {
            mkdir($base_path.'/headImg', 0777, true);
        }

        $info = $file->move($base_path.'/headImg');//图片保存路径
        $head_url = '/static/upload/headImg' . '/' . str_replace('\\', '/', $info->getSaveName());

        if ($info) {
            return ajaxSuccess(['head_url' => $head_url]);
        }else{
            return ajaxError('上传失败！');
        }
    }

    public function check()
    {
        $user_name = trim(request()->post('user_name'));
        $count = UserB::where('username', $user_name)->count();   

        if ($count > 0) {
            return ajaxSuccess();
        }     
        return ajaxError();
    }

    public function add()
    {
        $friend_id = intval(request()->post('user_id'));

        if ($friend_id == $this->userInfo['uid']) {
            return ajaxError('不能添加自己');
        }

        $friend_id = $friend_id;
        $uid = $this->userInfo['uid'];

        if (UserB::where('id', $friend_id)->count() == 0) {
            return ajaxError('该用户不存在');
        }

        if (ContactModel::where(['uid' => $uid, 'friend_id' => $friend_id])->count()) {
            return ajaxError('你和对方已经是朋友了');
        }

        $contact = new ContactModel();
        $contact->uid = $uid;
        $contact->friend_id = $friend_id;
        $contact->created_time = date('Y-m-d H:i:s');
        $contact->save();

        return ajaxSuccess();
    }

    public function changePsw()
    {
        return $this->fetch('changepsw');
    }

    public function email()
    {
        $email = trim(request()->get('email'));
        $code = makeRandStr();

        $data = [ 
            'user_email' => $email, //接收人邮箱 
            'content' => "您正在修改密码，验证码：{$code}，如非本人操作，请勿理会。" 
        ];

        $res = Email::sendEmail($data);

        if ($res['status']) {
            Cache::set('VERIFY_EMAIL_'.$email, $code, 5*60);
        }
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
        $model->password = trim($post_data['loginPwd']);
        $model->password_hash = pwdCrypt(trim($post_data['loginPwd']));
        $model->head_url = '/static/chat/img/avatar04.png';
        $model->created_at = time();

        $model->save();
        
        return ajaxSuccess();
    }

    public function logout()
    {
        Session::set('USER_INFO_SESSION', []);
        Session::set('is_login', 0);

        $this->redirect(url('/chat/index'));
    }
}