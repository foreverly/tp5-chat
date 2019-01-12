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
            'sidebar_menu_list' => Menu::getMenus(),
            // 'menu_html' => $this->makeMenuHtml()
        ]);
    }

    protected function checkLogin()
    {
        $this->isLogin = $this->isLogin();
    	if (!$this->isLogin && $this->needLogin) {
    		$this->redirect(url('/index.php/login'));
    	}else{
            $this->userInfo = Session::get('USER_INFO_SESSION') ?? [];            
        }
    }

    protected function isLogin()
    {
        return Session::get('is_login') ? true : false;
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