<?php
namespace app\index\model;

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
    public static function getMenus($login_status)
    {
        $data = [
            [
                'name' => '首页',
                'url' => '/',
                'children' => []
            ],
            [
                'name' => '美图',
                'url' => '#',
                'children' => [
                    [
                        'name' => '素材',
                        'url' => '/picture/sucai',
                        'children' => []
                    ],
                    [
                        'name' => '美女',
                        'url' => '/picture/meinv',
                        'children' => []
                    ],
                    [
                        'name' => '壁纸',
                        'url' => '/picture/bizhi',
                        'children' => []
                    ],
                    [
                        'name' => '图片库',
                        'url' => '/picture/libs',
                        'children' => []
                    ],
                ]
            ],
            [
                'name' => '文章',
                'url' => '#',
                'children' => [
                    [
                        'name' => 'PHP',
                        'url' => '/article/php',
                        'children' => []
                    ],
                    [
                        'name' => 'Linux',
                        'url' => '/article/linux',
                        'children' => []
                    ],
                    [
                        'name' => 'Docker',
                        'url' => '/article/docker',
                        'children' => []
                    ],
                    [
                        'name' => 'Others',
                        'url' => '/article/others',
                        'children' => []
                    ],
                ]
            ],
            [
                'name' => '娱乐',
                'url' => '#',
                'children' => [
                    [
                        'name' => '聊天室',
                        'url' => '/chat/group',
                        'children' => []
                    ],
                    [
                        'name' => '五子棋',
                        'url' => '/game/wuziqi',
                        'children' => []
                    ],
                ]
            ]
        ];

        $user_center = [
            'name' => '用户中心',
            'url' => '#',
            'children' => []
        ];

        if (!$login_status) {
            $user_center['children'] = [
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
            $user_center['children'] = [
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

        array_push($data, $user_center);

        return $data;
    }
}

?>