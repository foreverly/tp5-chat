<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\index\model\Tag;
// use app\index\model\Menu;
// use app\common\model\Menu;
use app\common\service\app\MenuService;
use app\index\model\Article;
use app\index\model\Setting;

class Common extends Controller
{
    protected $userInfo = [];

	protected $fakeInfo = [];

    protected $isLogin = false;

    protected $needLogin = false;

    public function _initialize()
    {
        $config = config('database');
        $config['hostname'] = $this->getIp();
        \think\Config::set('database', $config);

        $this->fakeInfo = [
            'user_name' => '18533076@qq.com',
            'nick_name' => '剪一束月光',
            'head_url' => '/static/chat/img/my.jpg',
            'my_sign' => "秋风清，秋月明。<br>落叶聚还散，<br>寒鸦栖复惊。<br>相思相见知何日，<br>此时此夜难为情。",
            'email' => '18533076@qq.com'
        ];

        if (! Session::get("is_login")) {
            Session::set("USER_INFO_SESSION", $this->fakeInfo);
            Session::set("is_login", true);
        }

        parent::_initialize();
        $this->checkLogin();

        $this->assign([
            'menu_list' => MenuService::getMenus(),
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
        return $_SERVER['HTTP_X_FORWARDED_HOST'] ?? ($_SERVER['HTTP_HOST'] ?? '');
    }

    //
    protected function checkLogin()
    {
        $this->isLogin = $this->isLogin();
    	if (!$this->isLogin && $this->needLogin) {
    		$this->redirect(url('/login'));
    	}else{
            $this->userInfo = $this->fakeInfo ?? Session::get('USER_INFO_SESSION') ?? [];            
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