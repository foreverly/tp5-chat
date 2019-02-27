<?php
namespace lib\weather;

use lib\base\Curl;

/**
 * 和风天气
 */
class HeFeng
{
	private $apiUrl = ''; // 实时天气预报
	private $forUrl = ''; // 3-10天天气预报
	private $appKey = '';

	public function __construct($url = '', $app_key = '')
	{
		$this->apiUrl = 'https://free-api.heweather.net/s6/weather/now'; // 实时天气预报;
		$this->forUrl = 'https://free-api.heweather.net/s6/weather/forecast'; // 3-10天天气预报
		$this->appKey = '948fe1a126e84048aafe755bff21884f';
	}

	public function getWeather($location = '')
	{
		$data = [
			'location' => $location,
			'key' => $this->appKey,
		];

		$res = Curl::get($this->apiUrl . '?' . http_build_query($data));

		$rdata = [];
		if ($res) {
			$rdata = json_decode($res, true);
			if ($rdata['HeWeather6'][0]['status'] = 'ok') {
				$rdata = $rdata['HeWeather6'][0];
			}else{
				return '未查询到结果';
			}
		}

		$basic  = $rdata['basic'];
		$update = $rdata['update'];
		$now	= $rdata['now'];

		$str = "【{$basic['location']}实时天气】\n\n{$now['cond_txt']}，当前气温{$now['tmp']}℃，体感温度{$now['fl']}℃，风力{$now['wind_sc']}级，风速{$now['wind_spd']}公里/小时。\n更新时间{$update['loc']}。";

		return $str;
	}

	// 历史天气
	public function getHistory($location = '')
	{
		$data = [
			'location' => $location,
			'date' => '2019-02-06',
			'key' => $this->appKey,
		];

		$res = Curl::get($this->apiUrl, $this->apiUrl . '?' . http_build_query($data));

		$rdata = [];
		if ($res) {
			$rdata = json_decode($res, true);
		}

		return $rdata;
	}

	// 3-10天的天气预报
	public function getForecast($location = '')
	{
		$data = [
			'location' => $location,
			'key' => $this->appKey,
		];

		$res = Curl::get($this->forUrl . '?' . http_build_query($data));

		$rdata = [];
		if ($res) {
			$rdata = json_decode($res, true);
			if ($rdata['HeWeather6'][0]['status'] = 'ok') {
				$rdata = $rdata['HeWeather6'][0];
			}else{
				return '未查询到结果';
			}
		}

		$str = '';
		if ($rdata) {
			$basic  = $rdata['basic'];
			$update = $rdata['update'];
			$daily  = $rdata['daily_forecast'];
			
			$str .= "【{$basic['location']}天气预报】\n\n";
			foreach ($daily as $key => $value) {
				$date = date('m-d', strtotime($value['date']));
				$str .= "{$date}日，白天{$value['cond_txt_d']}，夜晚{$value['cond_txt_n']}，气温{$value['tmp_min']}~{$value['tmp_max']}℃，风力{$value['wind_sc']}级，风速{$value['wind_spd']}公里/小时。\n";
			}
			$str .= "更新时间{$update['loc']}。";
		}

		return $str;
	}
}
?>