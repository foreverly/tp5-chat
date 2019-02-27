<?php
namespace lib\life;

use app\admin\model\Cookbook as Book;
use lib\base\Curl;
use think\Cache;
// use think\Db;

/**
 * 菜谱
 */
class Cookbook
{
	private $apiUrl = ''; // 请求地址
	private $appKey = '';

	public function __construct($url = '', $app_key = '')
	{
		$this->apiUrl = 'http://apis.juhe.cn/cook/query.php'; // 请求地址
		$this->appKey = '2f7cb831175c1a02b1929827d4a9ecb8';
	}

	public function getCookbooks($menu = '', $update = false)
	{
		if (empty($menu)) {
			echo '菜谱名不能为空<br>';exit;
		}

		if (Cache::get('LIFE_COOKBOOK_'.$menu) && !$update) {
			echo "【{$menu}】近一个月内查询过<br>";exit;
		}

		$data = [
			'menu' => $menu,
			'key' => $this->appKey,
		];

		$res = Curl::get($this->apiUrl . '?' . http_build_query($data));
		if ($res) {
			$rdata = json_decode($res, true);

			if ($rdata['resultcode'] == '200') {
				$list = $rdata['result']['data'];

				$mysql_data = [];
				foreach ($list as $key => $value) {

					// Cache::rm('LIFE_COOKBOOK_'.$value['id']);
					$id = Cache::get('LIFE_COOKBOOK_'.$value['id']);

					if (!$id) {

						$model = new Book();
						$model->source = '聚合数据';
						$model->source_id = $value['id'];
						$model->title = $value['title'];
						$model->tags = $value['tags'];
						$model->imtro = $value['imtro'];
						$model->ingredients = $value['ingredients'];
						$model->burden = $value['burden'];
						$model->albums = json_encode($value['albums']);
						$model->steps = json_encode($value['steps']);
						$model->request_num = 1;
						$model->like = 0;
						$model->created_at = date('Y-m-d H:i:s');

						// 防止重复存储
						if ($model->save()) {
							Cache::set('LIFE_COOKBOOK_'.$value['id'], $model->id);
						}
					}else{
						$model = Book::get($id);
						$model->source = '聚合数据';
						$model->source_id = $value['id'];
						$model->title = $value['title'];
						$model->tags = $value['tags'];
						$model->imtro = $value['imtro'];
						$model->ingredients = $value['ingredients'];
						$model->burden = $value['burden'];
						$model->albums = json_encode($value['albums']);
						$model->steps = json_encode($value['steps']);
						$model->request_num += 1;
						$model->like = 0;
						$model->updated_at = date('Y-m-d H:i:s');

						$model->save();
					}
				}

				Cache::set('LIFE_COOKBOOK_'.$menu, 1, 30*86400);// 查过的字段暂时不查了

				echo "【{$menu}】菜谱数据更新完毕";exit;
			}else{
				echo "未查询到【{$menu}】";exit;
			}
		}

		echo "未查询到结果【{$menu}】";exit;
	}

	public static function getMenu($menu = '')
	{
		$info = Book::getMenu($menu);

		$str  = "【{$info['title']}】\n\n";
		$str .= "{$info['imtro']}\n";
		$str .= "【食材】{$info['ingredients']}\n";
		$str .= "【佐料】{$info['burden']}\n";

		$str .= "【开始炒菜】\n";
		$steps = json_decode($info['steps'], true);
		foreach ($steps as $step_info) {
			$str .= $step_info['step'] . '\n';
		}

		return $str;
	}
}
?>