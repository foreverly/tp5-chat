<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use app\index\model\ContactModel;

class Contact extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('index', [
            'fromid' => $this->userInfo['uid']
        ]);
    }

    public function getList()
    {
        $fromid = $this->userInfo['uid'];

        $list = Db::table('contact')
            ->alias('c')
            ->field('friend_id, u.display_name, u.head_url, u.my_sign')
            ->where('c.uid', $fromid)
            ->join('user_backend u','c.friend_id = u.id', 'left')
            ->select();

        foreach ($list as $key => $value) {
            $list[$key]['chat_url'] = "/chat/with?toid=" . $value['friend_id'];
            $list[$key]['my_sign'] = !empty($value['my_sign']) ? $value['my_sign'] : '这个人很懒，啥也没说';
        }

        return ajaxSuccess($list);
    }
}
