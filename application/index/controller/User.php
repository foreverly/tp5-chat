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
        parent::_initialize();
    }
    
    public function profile()
    {
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

    public function logout()
    {
        Session::set('USER_INFO_SESSION', []);
        Session::set('is_login', 0);

        $this->redirect(url('/chat/index'));
    }
}