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

define('MY_SALT', '7JyV2hmLw3QkOo2dx2Zi7SILnk6mqDth');

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

if (!function_exists('strLength')) {
	/**
	 * PHP获取字符串中英文混合长度 
	 * @param $str string 字符串
	 * @param $$charset string 编码
	 * @return 返回长度，1中文=1位，2英文=1位
	 */
	function strLength($str,$charset='utf-8')
	{
	    if($charset=='utf-8') $str = iconv('utf-8','gb2312',$str);
	    $num = strlen($str);
	    $cnNum = 0;
	    for($i=0;$i<$num;$i++){
	        if(ord(substr($str,$i+1,1))>127){
	            $cnNum++;
	            $i++;
	       }
	    }
	    $enNum = $num-($cnNum*2);
	    $number = ($enNum/2)+$cnNum;
	    return ceil($number);
	}
}

if (!function_exists('cutStr')) {
	/**
	 * 
	 * 中英混合的字符串截取
	 * @param unknown_type $sourcestr
	 * @param unknown_type $cutlength
	 */
	function cutStr($sourcestr = '', $cutlength = 20, $addstr = '...')
	{
	  	$returnstr = '';
	  	$i = 0;
	  	$n = 0;
	  	$str_length = strlen ( $sourcestr ); //字符串的字节数 
	  	while ( ($n < $cutlength) and ($i <= $str_length) ) {
	    	$temp_str = substr ( $sourcestr, $i, 1 );
	    	$ascnum = Ord ( $temp_str ); //得到字符串中第$i位字符的ascii码 
		    if ($ascnum >= 224) //如果ASCII位高与224，
		    {
		      $returnstr = $returnstr . substr ( $sourcestr, $i, 3 ); //根据UTF-8编码规范，将3个连续的字符计为单个字符   
		      $i = $i + 3; //实际Byte计为3
		      $n ++; //字串长度计1
		    } 
		    elseif ($ascnum >= 192) //如果ASCII位高与192，
		    {
		      $returnstr = $returnstr . substr ( $sourcestr, $i, 2 ); //根据UTF-8编码规范，将2个连续的字符计为单个字符 
		      $i = $i + 2; //实际Byte计为2
		      $n ++; //字串长度计1
		    } 
		    elseif ($ascnum >= 65 && $ascnum <= 90) //如果是大写字母，
		    {
		      $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
		      $i = $i + 1; //实际的Byte数仍计1个
		      $n ++; //但考虑整体美观，大写字母计成一个高位字符
		    } 
		    else //其他情况下，包括小写字母和半角标点符号，
		    {
		      $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
		      $i = $i + 1; //实际的Byte数计1个
		      $n = $n + 0.5; //小写字母和半角标点等与半个高位字符宽...
		    }
		}

	  	if ($str_length > $cutlength) {
	    	$returnstr = $returnstr . $addstr; //超过长度时在尾处加上省略号
	  	}

	  	return $returnstr;
	}
}

if (!function_exists('pwdCrypt')) {
	/**
	 * PHP获取字符串中英文混合长度 
	 * @param $psw string 字符串
	 * @param $salt string 盐值
	 * @return 返回hash
	 */
	function pwdCrypt($psw)
	{
		$psw = md5($psw);
		$psw = crypt($psw, MY_SALT);
	    return $psw;
	}
}

if (!function_exists('makeRandStr')) {
	/*
	 * 生成随机字符串
	 * @param int $length 生成随机字符串的长度
	 * @param string $char 组成随机字符串的字符串
	 * @return string $string 生成的随机字符串
	 */
	function makeRandStr($length = 32, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') 
	{		
	    if(!is_int($length) || $length < 0) {
	        return false;
	    }

	    $string = '';
	    for($i = $length; $i > 0; $i--) {
	        $string .= $char[mt_rand(0, strlen($char) - 1)];
	    }

	    return $string;
	}
}

if (!function_exists('makeVerifyCode')) {
	/*
	 * 生成随机验证码
	 * @param int $length 生成随机字符串的长度
	 * @param string $char 组成随机字符串的字符串
	 * @return string $string 生成的随机验证码
	 */
	function makeVerifyCode($length = 6, $char = '0123456789') 
	{		
	    if(!is_int($length) || $length < 0) {
	        return false;
	    }

	    $string = '';
	    for($i = $length; $i > 0; $i--) {
	        $string .= $char[mt_rand(0, strlen($char) - 1)];
	    }

	    return $string;
	}
}

	