<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
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
        $user = UserB::get($this->userInfo['uid']);
        $user->display_name = request()->post('nickName');
        $user->head_url = request()->post('headUrl');
        $user->my_sign = request()->post('mySign');
        $user->updated_at = date('Y-m-d H:i:s');

        if ($user->save()) {
            $this->userInfo['nick_name'] = $user->display_name;
            $this->userInfo['head_url'] = $user->head_url;
            $this->userInfo['my_sign'] = $user->my_sign;

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
        $friend_name = trim(request()->post('user_name'));

        if ($friend_name == $this->userInfo['user_name']) {
            return ajaxError('不能添加自己');
        }

        $friend_info = UserB::get(['username' => $friend_name]);

        if (ContactModel::where(['uid' => $this->userInfo['uid'], 'friend_id' => $friend_info->id])->count()) {
            return ajaxError('你和对方已经是朋友了');
        }

        $contact = new ContactModel();
        $contact->uid = $this->userInfo['uid'];
        $contact->friend_id = $friend_info->id;
        $contact->created_time = date('Y-m-d H:i:s');
        $contact->save();

        return ajaxSuccess();
    }

    public function logout()
    {
        Session::set('USER_INFO_SESSION', []);
        Session::set('is_login', 0);

        $this->redirect(url('/chat/index'));
    }
}
