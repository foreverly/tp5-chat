<?php
namespace app\blog\controller;

use think\Controller;
use think\Request;

class Index extends Common
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch('lw-index', [
            'menu_list' => $this->getMenus(),
            'article_list' => $this->getArticles(),
            'rotation_list' => $this->getRotations(),
            'user_info' => $this->userInfo
        ]);
    }

    /*
    * 获取菜单列表
    * 模拟
    * author：Bruce
    */
    public function getMenus()
    {
        return [
            [
                'name' => '首页',
                'url' => '/blog.php',
                'children' => []
            ],
            [
                'name' => '美图',
                'url' => '#',
                'children' => [
                    [
                        'name' => '素材',
                        'url' => '/blog.php/picture/sucai',
                        'children' => []
                    ],
                    [
                        'name' => '美女',
                        'url' => '/blog.php/picture/meinv',
                        'children' => []
                    ],
                    [
                        'name' => '壁纸',
                        'url' => '/blog.php/picture/bizhi',
                        'children' => []
                    ],
                    [
                        'name' => '图片库',
                        'url' => '/blog.php/picture/libs',
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
                        'url' => '/blog.php/article/php',
                        'children' => []
                    ],
                    [
                        'name' => 'Linux',
                        'url' => '/blog.php/article/linux',
                        'children' => []
                    ],
                    [
                        'name' => 'Docker',
                        'url' => '/blog.php/article/docker',
                        'children' => []
                    ],
                    [
                        'name' => 'Others',
                        'url' => '/blog.php/article/others',
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
                        'url' => '/blog.php/relax/chat',
                        'children' => []
                    ],
                    [
                        'name' => '五子棋',
                        'url' => '/blog.php/relax/wuziqi',
                        'children' => []
                    ],
                ]
            ],
            [
                'name' => '用户中心',
                'url' => '#',
                'children' => [
                    [
                        'name' => '个人中心',
                        'url' => '/blog.php/user/profile',
                        'children' => []
                    ],
                    [
                        'name' => '时间轴',
                        'url' => '/blog.php/user/time',
                        'children' => []
                    ],
                    [
                        'name' => '退出',
                        'url' => '/blog.php/user/logout',
                        'children' => []
                    ],
                ]
            ]
        ];
    }

    /*
    * 获取文章列表
    * 模拟
    * author：Bruce
    */
    public function getArticles()
    {
        return [
            [
                'title' => '我本楚狂人，凤歌笑孔丘',
                'url' => '/article/1',
                'covor_picture' => '/blog/assets/i/f10.jpg',
                'slogan' => '我们一直在坚持着，不是为了改变这个世界，而是希望不被这个世界所改变。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
            [
                'title' => '世间所有的相遇，都是久别重逢。',
                'url' => '/article/2',
                'covor_picture' => '/blog/assets/i/f6.jpg',
                'slogan' => '你可以选择在原处不停地跟周遭不解的人解释你为何这么做，让他们理解你，你可以选择什么都不讲，自顾自往前走。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
            [
                'title' => '陌上花开，可缓缓归矣。',
                'url' => '/article/3',
                'covor_picture' => '/blog/assets/i/f12.jpg',
                'slogan' => '那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。我们就在骑楼下躲雨，看绿色的邮筒孤独地站在街的对面。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
            [
                'title' => '爱自己是终生浪漫的开始',
                'url' => '/article/4',
                'covor_picture' => '/blog/assets/i/f22.jpg',
                'slogan' => '那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。我们就在骑楼下躲雨，看绿色的邮筒孤独地站在街的对面。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
            [
                'title' => '我本楚狂人，凤歌笑孔丘',
                'url' => '/article/5',
                'covor_picture' => '/blog/assets/i/f10.jpg',
                'slogan' => '我们一直在坚持着，不是为了改变这个世界，而是希望不被这个世界所改变。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
            [
                'title' => '一想到你，我这张丑脸上就泛起微笑',
                'url' => '/article/6',
                'covor_picture' => '/blog/assets/i/f10.jpg',
                'slogan' => '那一天我二十一岁，在我一生的黄金时代。我有好多奢望。我想爱，想吃，还想在一瞬间变成天上半明半暗的云。',
                'author' => 'Bruce',
                'from' => '52xue.site',
                'time' => date('Y/m/d')
            ],
        ];
    }

    /*
    * 获取轮播列表
    * 模拟
    * author：Bruce
    */
    public function getRotations()
    {
        return [
            [
                'picture' => '/blog/assets/i/b1.jpg',
                'title' => '这城市那么空',
                'slogan' => '那时候下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。',
                'author' => 'Bruce'
            ],
            [
                'picture' => '/blog/assets/i/b2.jpg',
                'title' => '落花流水',
                'slogan' => '这段旅程若算幸运，亦是无负这一生',
                'author' => 'Bruce'
            ],
            [
                'picture' => '/blog/assets/i/b3.jpg',
                'title' => '富士山下',
                'slogan' => '何不把悲哀感觉假设是来自你虚构？',
                'author' => 'Bruce'
            ]
        ];
    }
}
