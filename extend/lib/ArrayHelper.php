<?php
namespace lib;

/**
 * Array 助手类
 */
class ArrayHelper 
{
	
	public static function map($array = [], $index = null, $to = null)
	{
		if (!is_string($index)) {
			echo "数组索引必须是字符";exit;
		}

		if (empty($array) || $index == '' || $index == null) {
			return $array;
		}

		$new = [];
		foreach ($array as $key => $value) {

			if (!isset($value[$index]) || !isset($value[$to])) {
				echo "指定的数组索引不存在";exit;
			}

			if ($index == '' || $index == null) {
				$new[$value[$index]] = $value;
			}else{
				$new[$value[$index]] = $value[$to];
			}
		}

		return $new;
	}
}

?>