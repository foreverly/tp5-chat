<?php
namespace lib\life;

use app\admin\model\Cookbook as Book;
use app\admin\model\Article;
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
					$ids = Cache::get('LIFE_COOKBOOK_'.$value['id']);

					if (!$ids) {

						// 菜谱表
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

						// 文章表
						$Article = new Article();
						$Article->author_id = '1000001';// 聚合数据
						$Article->title = $value['title'];
						$Article->sub_title = '';
						$Article->desc = $value['imtro'];
						$Article->slogan = $value['tags'];
						$Article->category = $value['tags'];
						$Article->seo_keywords = $value['tags'];
						$Article->cover_image = current($value['albums']);
						$Article->type = 3;
						$Article->created_time = date('Y-m-d H:i:s');
						$Article->content  =  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$value['imtro']}<br><br>";
						$Article->content .=  "【食材】{$value['ingredients']}<br/>";
						$Article->content .=  "【佐料】{$value['burden']}<br/>";
						$Article->content .=  "【开始】：<br/>";

						$steps = $value['steps'];
						foreach ($steps as $step_info) {
							$Article->content .=  "{$step_info['step']}<br/><img src='{$step_info['img']}' /><br/><br/>";
						}

						// 防止重复存储
						if ($model->save() && $Article->save()) {
							Cache::set('LIFE_COOKBOOK_'.$value['id'], json_encode(['cookbook_id' => $model->id, 'article_id' => $Article->id]));
						}
					}else{

						$ids = json_decode($ids, true);
						$book_id = $ids['cookbook_id'];
						$article_id = $ids['article_id'];

						// 菜谱表
						$model = Book::get($book_id);
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

						// 文章表
						$Article = Article::get($article_id);
						$Article->author_id = '1000001';// 聚合数据
						$Article->title = $value['title'];
						$Article->sub_title = '';
						$Article->desc = $value['imtro'];
						$Article->slogan = $value['tags'];
						$Article->category = $value['tags'];
						$Article->seo_keywords = $value['tags'];
						$Article->cover_image = current($value['albums']);
						$Article->type = 3;
						$Article->updated_time = date('Y-m-d H:i:s');
						$Article->content  =  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$value['imtro']}<br><br>";
						$Article->content .=  "【食材】{$value['ingredients']}<br/>";
						$Article->content .=  "【佐料】{$value['burden']}<br/>";
						$Article->content .=  "【开始】：<br/>";

						$steps = $value['steps'];
						foreach ($steps as $step_info) {
							$Article->content .=  "{$step_info['step']}<br/><img src='{$step_info['img']}' /><br/><br/>";
						}

						$Article->save();
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
		$info = Article::getMenu($menu);

		$str  = "点击前往查看<a href='http://www.52xue.site/article/info?id=" . $info['id'] . "'>【{$info['title']}】</a>的详细制作过程~";

		return $str;
	}
}
?>