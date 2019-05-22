<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Menu extends Model
{
    protected $pk = 'id';

    protected $table = 'menu';

    /*
    * 获取菜单列表
    * 模拟
    * author：Bruce
    */
    public function getMenus($where = [])
    {
        // $data = [
        //     [
        //         'name' => '首页',
        //         'url' => "javascript:jumpPage('index');",
        //         'check' => false,
        //         'icon' => 'am-icon-home',
        //         'message' => [
        //             'num' => 9,
        //             'color' => 'primary',
        //         ],
        //         'children' => []
        //     ],            
        //     [
        //         'name' => '菜单管理',
        //         'url' => "/menu",
        //         'check' => false,
        //         'icon' => 'am-icon-share-alt',
        //         'message' => null,
        //         'children' => []
        //     ],
        //     [
        //         'name' => '轮播图设置',
        //         'url' => "javascript:jumpPage('banner');",
        //         'check' => false,
        //         'icon' => 'am-icon-image',
        //         'message' => [
        //             'num' => 9,
        //             'color' => 'success',
        //         ],
        //         'children' => []
        //     ],
        //     [
        //         'name' => '美图',
        //         'url' => "#",
        //         'check' => false,
        //         'icon' => 'am-icon-camera-retro',
        //         'message' => null,
        //         'children' => [
        //             [
        //                 'name' => '素材',
        //                 'url' => "/picture/sucai",
        //                 'icon' => 'am-icon-circle-o',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => '美女',
        //                 'url' => '/picture/meinv',
        //                 'icon' => 'am-icon-circle-o',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => '壁纸',
        //                 'url' => '/picture/bizhi',
        //                 'icon' => 'am-icon-circle-o',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => '图片库',
        //                 'url' => '/picture/libs',
        //                 'icon' => 'am-icon-circle-o',
        //                 'children' => []
        //             ],
        //         ]
        //     ],
        //     [
        //         'name' => '文章管理',
        //         'url' => 'javascript:jumpPage("article", "php");',
        //         'check' => false,
        //         'icon' => 'am-icon-envira',
        //         'message' => null,
        //         'children' => [
        //             [
        //                 'name' => 'PHP',
        //                 'url' => 'javascript:jumpPage("article", "php");',
        //                 'icon' => 'am-icon-book',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => 'Linux',
        //                 'url' => 'javascript:jumpPage("article", "linux");',
        //                 'icon' => 'am-icon-book',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => 'Docker',
        //                 'url' => 'javascript:jumpPage("article", "docker");',
        //                 'icon' => 'am-icon-book',
        //                 'children' => []
        //             ],
        //             [
        //                 'name' => 'Others',
        //                 'url' => 'javascript:jumpPage("article", "others");',
        //                 'icon' => 'am-icon-book',
        //                 'children' => []
        //             ],
        //         ]
        //     ]
        // ];

        // $web_setting = [
        //     'name' => '网站管理',
        //     'url' => 'javascript:jumpPage("setting", "basic");',
        //     'check' => false,
        //     'icon' => 'am-icon-cog',
        //     'message' => [
        //         'num' => 9,
        //         'color' => 'danger',
        //     ],
        //     'children' => []
        // ];

        // if (!$user_info) {
        //     // $user_center['children'] = [
        //     //     [
        //     //         'name' => '登录',
        //     //         'url' => '/login',
        //     //         'children' => []
        //     //     ],
        //     //     [
        //     //         'name' => '注册',
        //     //         'url' => '/register',
        //     //         'children' => []
        //     //     ]
        //     // ];
        // }else{
        //     $web_setting['children'] = [
        //         [
        //             'name' => '基础配置',
        //             'url' => 'javascript:jumpPage("setting", "basic");',
        //             'icon' => 'am-icon-circle-o',
        //             'children' => []
        //         ],
        //         [
        //             'name' => '其他',
        //             'url' => 'javascript:jumpPage("setting", "others");',                    
        //             'icon' => 'am-icon-circle-o',
        //             'children' => []
        //         ],
        //         [
        //             'name' => '注销',
        //             'url' => '/user/logout',                    
        //             'icon' => 'am-icon-sign-out',
        //             'children' => []
        //         ],
        //     ];
        // }

        // array_push($data, $web_setting);

        // foreach ($data as &$value) {
        //     $value['url'] = str_replace('"', "'", $value['url']);
        //     $value['message'] = $value['message'] ?? null;
        //     foreach ($value['children'] as &$v) {
        //         $v['url'] = str_replace('"', "'", $v['url']);
        //         $v['message'] = $v['message'] ?? null;
        //     }
        // }

        // $menu_list = self::all()->toArray();        
        
        // $data = [];
        // foreach ($menu_list as $key => $menu) {
        //     if ($menu['parent']) {
        //         $data[$menu['parent']]['children'][] = [
        //             'name' => $menu['name'],
        //             'url' => str_replace('"', "'", $menu['route']),
        //             'message' => $menu['message'] ?? null,
        //             'icon' => $menu['data'] ?? 'circle-o',
        //             'children' => [],
        //         ];
        //     }else{
        //         $data[$menu['id']] = [
        //             'name' => $menu['name'],
        //             'url' => str_replace('"', "'", $menu['route']),
        //             'message' => $menu['message'] ?? null,
        //             'icon' => $menu['data'] ?? 'circle-o',
        //             'children' => [],
        //         ];
        //     }
        // }

        $menu_list = Db::table($this->table)->where($where)->order('order asc, id asc')->select();

        return $menu_list;
    }
}

?>