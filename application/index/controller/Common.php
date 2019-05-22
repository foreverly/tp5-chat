<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\index\model\Tag;
use app\index\model\Menu;
use app\index\model\Article;
use app\index\model\Setting;

class Common extends Controller
{
	protected $userInfo = [];

    protected $isLogin = false;

    protected $needLogin = true;

    public function _initialize()
    {
        $config = config('database');
        $config['hostname'] = $this->getIp();
        \think\Config::set('database', $config);

        parent::_initialize();
        $this->checkLogin();
        
        $this->assign([
            'menu_list' => Menu::getMenus($this->isLogin),
            'tag_list' => json_encode($this->comTags()),
            'hot_articles' => (new Article())->getHots(['status' => 1, 'hot' => 1]),
            'is_login' => $this->isLogin,
            'settingInfo' => Setting::getSettings(),
            'user_info' => $this->userInfo
        ]);

    }

    /**
     * 获取ip地址
     **/
    public  static function getIp() {
        static $ip = '';
        $ip = $_SERVER['REMOTE_ADDR'];

        if(isset($_SERVER['HTTP_CDN_SRC_IP'])) {
            $ip = $_SERVER['HTTP_CDN_SRC_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
            foreach ($matches[0] AS $xip) {
              if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
              }
            }
        }

        return $ip;
    }

    //
    protected function checkLogin()
    {
        $this->isLogin = $this->isLogin();
    	if (!$this->isLogin && $this->needLogin) {
    		$this->redirect(url('/login'));
    	}else{
            $this->userInfo = Session::get('USER_INFO_SESSION') ?? [];            
        }
    }

    protected function isLogin()
    {
        return Session::get('is_login') ? true : false;
    }

    /*
    * 获取标签列表
    * 模拟
    * author：Bruce
    */
    public function comTags()
    {
        $res = (new Tag())->getTags(['status' => 1]);

        $tag_list = [];
        foreach ($res as $key => $value) {
            $tag_list[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'url' => '#'
            ];
        }

        return ($tag_list);
    }
}