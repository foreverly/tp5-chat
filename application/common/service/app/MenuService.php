<?php
namespace app\common\service\app;

use think\Session;
use app\common\model\Menu;

/**
 * Menu服务层
 */
class MenuService
{	
	public static function getMenus()
    {
    	$is_login = Session::get('is_login');  	
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