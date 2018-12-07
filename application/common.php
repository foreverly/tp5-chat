<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

if (!function_exists('ajaxSuccess')) {
	function ajaxSuccess($data = [])
	{
		echo json_encode(['code' => 200, 'status' => 'success', 'data' => $data]);exit; 
	}
}

if (!function_exists('ajaxError')) {
	function ajaxError($msg = '')
	{
		echo json_encode(['code' => -1, 'status' => 'error', 'msg' => $msg]);exit; 
	}
}