<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use app\index\model\User;
use app\index\model\ChatContent;

class Chat extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function index()
    {
        return $this->fetch('lists', [
            'fromid' => $this->userInfo['uid']
        ]);
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function with()
    {
        return $this->fetch('index',[
            'fromid' => $this->userInfo['uid'],
            'toid' => Request::instance()->get('toid', ''),
        ]);
    }

    /**
    *  消息文本保存
    */
    public function save()
    {
        $post_data = Request::instance()->post();

        $model = new ChatContent();
        $model->fromid = $this->userInfo['uid'];
        $model->fromname = $this->userInfo['nick_name'];
        $model->toid = $post_data['toid'];
        $model->toname = User::getName($post_data['toid']);
        $model->content = $post_data['data'];
        $model->isread = 0;
        $model->created_time = $post_data['date'];
        $model->type = 1; // 1=文本,2=图片

        $model->save();
        
        return ajaxSuccess();
    }

    /**
    *  消息图片保存
    */
    public function uploadImg()
    {
        $post_data = Request::instance()->post();

        $file = $_FILES['file'];

        $base_path = ROOT_PATH . "public";
        if (!is_dir($base_path . "/static/upload/")) {
            mkdir($base_path . "/static/upload/");
        }
        $file_name = uniqid('chat_img_');
        $file_path = "/static/upload/" . $file_name . strrchr($file['name'], '.');
        
        if ($res = move_uploaded_file($file['tmp_name'], $base_path . $file_path)) {
            
            $model = new ChatContent();
            $model->fromid = $this->userInfo['uid'];
            $model->fromname = $this->userInfo['nick_name'];
            $model->toid = $post_data['toid'];
            $model->toname = User::getName($post_data['toid']);
            $model->content = $file_path;
            $model->isread = 0;
            $model->created_time = date('Y-m-d H:i:s');
            $model->type = 2; // 1=文本,2=图片

            $model->save();

            return ajaxSuccess(['img_url' => $file_path]);
        }

        return ajaxError('图片保存失败');
    }

    /**
    *  消息列表
    */
    public function list()
    {
        $fromid = $this->userInfo['uid'];

        $res = Db::table('chat_content')
        	->alias('cc')
        	->field('fromid, toid, content, isread, type, created_time, u.display_name, cc.fromname, u.head_url')
        	->where('toid', $fromid)
        	->join('user_backend u','cc.fromid = u.id', 'left')
        	->select();
        // var_dump(Db::getLastSql());
        // var_dump($res);
        // exit;
        $opts = [];
        foreach ($res as $key => $value) {

            $fromid = $value['fromid'];
            $toid = $value['toid'];

            if (!isset($noread[$fromid])) {
                $noread[$fromid] = 0;
            }

            if(!$value['isread']){                
                $noread[$fromid]++;
                
            }

            $opts[$fromid] = [
                'fromid' => $fromid,
                'fromname' => $value['fromname'],
                'head' => $value['head_url'],
                'toid' => $toid,
                'content' => cutStr($value['content'], 20),
                'noread' => $noread[$fromid] > 99 ? '99+' : (string)$noread[$fromid],
                'type' => $value['type'],
                'chat_url' => '/chat/with?toid=' . $fromid,
                'created_time' => $value['created_time'],
            ];
        }

        return ajaxSuccess(array_values($opts));
    }

    /**
    * 修改已读状态
    */
    public function changeRead()
    {
        $fromid = $this->userInfo['uid'];
        $toid = Request::instance()->post('toid', '');
        // $model = new ChatContent;
        $res = (new ChatContent)->save(['isread' => 1], ['fromid' => $toid, 'toid' => $fromid, 'isread' => 0]);

        return ajaxSuccess(['count' => $res]);
    }

    /**
    *  获取历史消息
    */
    public function loadMessage()
    {
        $fromid = $this->userInfo['uid'];
        $toid = Request::instance()->post('toid', '');
        $page = Request::instance()->post('page', 1);

        $list = ChatContent::find()
            ->where("(fromid=:fromid and toid=:toid) or (fromid=:toid and toid=:fromid)", [":fromid" => $fromid, ":toid" => $toid])
            ->select("*")
            ->limit(10)
            ->offset(($page - 1) * 10)
            ->orderBy('id asc')
            ->asArray()
            ->all();

        return ajaxSuccess($list);
    }

    /**
    *  根据用户ID获取头像
    */
    public function getHead()
    {
        $fromid = $this->userInfo['uid'];
        $toid = Request::instance()->post('toid', '');

        $toinfo = Db::table('user_backend')->field('display_name as nick_name, head_url')->where('id', $toid)->find();

        return ajaxSuccess(['frominfo' => $this->userInfo, 'toinfo' => $toinfo]);
    }
}
