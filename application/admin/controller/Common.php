<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Jump;
use app\admin\model\Menu;

class Common extends Controller
{
	protected $userInfo = [];

    protected $isLogin = false;

    protected $needLogin = true;

    protected $request = null;

    public function _initialize()
    {
        $config = config('database');
        $config['hostname'] = $this->getIp();
        \think\Config::set('database', $config);

        parent::_initialize();        
        $this->checkLogin();
        $this->request = Request::instance();

        // foreach ($menu_list as &$menu) {
        //     $url = trim($menu['url'], '#');
        //     foreach ($menu['children'] as $children) {
        //         if ($url && stripos($this->request->url(), $url) !== false) {
        //             $menu['check'] = true;
        //         }
        //     }
        // }
        
        $this->assign([
            'sidebar_menu_list' => $this->getMenus(),
            // 'menu_html' => $this->makeMenuHtml()
        ]);
    }

    /**
     * 获取ip地址
     **/
    public  static function getIp() {
        return $_SERVER['HTTP_X_FORWARDED_HOST'] ?? ($_SERVER['HTTP_HOST'] ?? '');
    }

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

    public function getMenus()
    {
        $menu_list = (new Menu())->getMenus(['status' => 1, 'type' => 0]);
        $data = [];
        foreach ($menu_list as $key => $menu) {
            if ($menu['parent']) { 
                           
                // if (!isset($data[$menu['parent']])) {
                //     continue;
                // }

                $check = $this->checkUrl($menu['route']);
                $data[$menu['parent']]['children'][] = [
                    'name' => $menu['name'],
                    'url' => str_replace('"', "'", $menu['route']),
                    'message' => $menu['message'] ?? null,
                    'icon' => $menu['data'] ?? 'circle-o',
                    'check' => $check,
                    'children' => [],
                ];

                if ($check) {
                    $data[$menu['parent']]['check'] = $check;
                }
            }else{
                $data[$menu['id']] = [
                    'name' => $menu['name'],
                    'url' => str_replace('"', "'", $menu['route']),
                    'message' => $menu['message'] ?? null,
                    'icon' => $menu['data'] ?? 'circle-o',
                    'check' => $this->checkUrl($menu['route']),
                    'children' => [],
                ];
            }
        }

        return $data;
    }

    public function checkUrl($url = '')
    {        
        $module_name = $this->request->module();
        $controller_name = strtolower($this->request->controller());
        $action = $this->request->action();
        $active_url = $controller_name.'/'.$action;

        $url_arr = parse_url($url);

        if (isset($url_arr['path'])) {
            $path_list = str_replace('.php', '', trim($url_arr['path'], '/'));
            $path_list = explode('/', $path_list);
            $path_stri = ($path_list[0] ?? 'index') . '/' . ($path_list[1] ?? 'index');
        }else{
            $path_stri = '';
        }

        return strtolower($active_url) == strtolower($path_stri);
    }

    public function makeMenuHtml()
    {
        $menu_list = Menu::getMenus($this->isLogin);

        $menu_html = '<ul class="am-list admin-sidebar-list">';
        foreach ($menu_list as $key => $menu) {
            $menu_html .= '<li class="list-parent ';
            if (!empty($menu['children'])) {
                $menu_html .= 'admin-parent';
            }
            $menu_html .= '">';
            $menu_html .=     '<a href="' . $menu['url'] . '" ';
            if($menu['children']){
                $menu_html .= 'class="am-cf lalalaji" data-am-collapse="{target: \'#collapse-nav\'}"';
            }
            $menu_html .=     '>';

            $menu_html .=         '<span class="' . $menu['icon'] . '"></span> ' . $menu['name'];

            if (!empty($menu['children'])) {
                $menu_html .=     '<span class="am-icon-angle-right am-fr am-margin-right"></span>';
                $menu_html .=     '<ul class="am-list am-collapse admin-sidebar-sub child-ul" id="collapse-nav" style="">';

                foreach ($menu['children'] as $k => $child) {
                    $menu_html .=     '<li>';
                    $menu_html .=         '<a href="' . $child['url'] . '"';
                    if ($k == 0) {
                        $menu_html .= 'class="am-cf"';
                    }
                    $menu_html .=         ' >';
                    $menu_html .=             '<span class="' . $child['icon'] . '"></span> ' . $child['name'];
                    $menu_html .=         '</a>';
                    $menu_html .=     '</li>';
                }

                $menu_html .=     '</ul>';
            }

            $menu_html .=     '</a>';
            $menu_html .= '</li>';
        }

        $menu_html .= '</ul>';

        return $menu_html;
    }

    public function paginate(array $data)
    {
        
            
        $str = <<<ET
            div class="am-margin am-cf">
                <hr/>
                <p class="am-fl">共 {$total} 条记录</p>
                <ol class="am-pagination am-fr">
                  <li class="am-disabled"><a href="#">&laquo;</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ol>
            </div>
ET;
        
    }
}