<?php
namespace app\admin\model;

use think\Model;

class MenuModel extends Model
{
    protected $pk = 'id';

    protected $table = 'menu';

    /*
    * 获取菜单列表
    * 模拟
    * author：Bruce
    */
    public static function getMenus($user_info = [])
    {
        $data = [
            [
                'name' => '首页',
                'url' => '/admin.php',
                'icon' => 'am-icon-home',
                'children' => []
            ],
            [
                'name' => '轮播图设置',
                'url' => '/admin.php/banner',
                'icon' => 'am-icon-recycle',
                'children' => []
            ],
            [
                'name' => '美图',
                'url' => '#',
                'icon' => 'am-icon-circle-o',
                'children' => [
                    [
                        'name' => '素材',
                        'data' => 'sucai',
                        'url' => '#',
                        'icon' => 'am-icon-circle-o',
                        'children' => []
                    ],
                    [
                        'name' => '美女',
                        'data' => 'meinv',
                        'url' => '#',
                        'icon' => 'am-icon-circle-o',
                        'children' => []
                    ],
                    [
                        'name' => '壁纸',
                        'data' => 'bizhi',
                        'url' => '#',
                        'icon' => 'am-icon-circle-o',
                        'children' => []
                    ],
                    [
                        'name' => '图片库',
                        'data' => 'libs',
                        'url' => '#',
                        'icon' => 'am-icon-circle-o',
                        'children' => []
                    ],
                ]
            ],
            [
                'name' => '文章管理',
                'url' => '#',
                'icon' => 'am-icon-book',
                'children' => [
                    [
                        'name' => 'PHP',
                        'url' => '/admin.php/article/php',
                        'icon' => 'am-icon-book',
                        'children' => []
                    ],
                    [
                        'name' => 'Linux',
                        'url' => '/admin.php/article/linux',
                        'icon' => 'am-icon-book',
                        'children' => []
                    ],
                    [
                        'name' => 'Docker',
                        'url' => '/admin.php/article/docker',
                        'icon' => 'am-icon-book',
                        'children' => []
                    ],
                    [
                        'name' => 'Others',
                        'url' => '/admin.php/article/others',
                        'icon' => 'am-icon-book',
                        'children' => []
                    ],
                ]
            ]
        ];

        $web_setting = [
            'name' => '网站管理',
            'url' => '#',
            'icon' => 'am-icon-cog',
            'children' => []
        ];

        if (!$user_info) {
            // $user_center['children'] = [
            //     [
            //         'name' => '登录',
            //         'url' => '/login',
            //         'children' => []
            //     ],
            //     [
            //         'name' => '注册',
            //         'url' => '/register',
            //         'children' => []
            //     ]
            // ];
        }else{
            $web_setting['children'] = [
                [
                    'name' => '基础配置',
                    'url' => '/admin.php/setting/basic',
                    'icon' => 'am-icon-circle-o',
                    'children' => []
                ],
                [
                    'name' => '其他',
                    'url' => '/admin.php/setting/others',                    
                    'icon' => 'am-icon-circle-o',
                    'children' => []
                ],
                [
                    'name' => '注销',
                    'url' => '/user/logout',                    
                    'icon' => 'am-icon-sign-out',
                    'children' => []
                ],
            ];
        }

        array_push($data, $web_setting);

        return $data;
    }
}

?>