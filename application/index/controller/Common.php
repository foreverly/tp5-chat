<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\index\model\Tag;
// use app\index\model\Menu;
use app\common\model\Menu;
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
            'menu_list' => $this->comMenus($this->isLogin),
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

    public function comMenus($is_login = false)
    {
        $res = Menu::getAll("*", ['type' => 1, 'status' => 1], "order desc");

        $list = [];
        foreach ($res as $key => $value) {
            $id   = $value['id'];
            $pid  = $value['parent'];
            $data = [
                'name' => $value['name'],
                'url' => $value['route'] ?: "#",
                'children' => [],
            ];

            if (in_array($value['name'], ['用户中心', '个人中心'])) {
                if (!isset($list[$id])) {

                    $list[$id] = $data;

                    if (!$is_login) {
                        $user_center = [
                            [
                                'name' => '登录',
                                'url' => '/login',
                                'children' => []
                            ],
                            [
                                'name' => '注册',
                                'url' => '/register',
                                'children' => []
                            ]
                        ];
                    }else{
                        $user_center = [
                            [
                                'name' => '个人中心',
                                'url' => '/user/profile',
                                'children' => []
                            ],
                            [
                                'name' => '时间轴',
                                'url' => '/user/time',
                                'children' => []
                            ],
                            [
                                'name' => '退出',
                                'url' => '/user/logout',
                                'children' => []
                            ],
                        ];
                    }

                    $list[$id]['children'] = $user_center;
                }
            }else{
                if ($pid) {
                    $list[$pid]['children'][] = $data;
                }else{
                    $list[$id] = $data;
                }
            }
        }
        
        return array_values($list);
    }
}