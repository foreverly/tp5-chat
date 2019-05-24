<?php
namespace app\admin\model;

use think\Model;

class PictureModel extends Model
{
    protected $pk = 'id';

    protected $table = 'picture';

    /*
    * 获取菜单列表
    * 模拟
    * author：Bruce
    */
    public static function getPictures()
    {

        $data = [];
        for ($i=0; $i < 198; $i++) { 
            $data[$i] = [
                'url' => '#',
                'img_url' => '/blog/admin/picture/bing-'.rand(1, 4).'.jpg',
                'title' => self::getRandTitle(),
                'desc' => date('Y-m-d')
            ];
        }

        return $data;
    }

    private static function getRandTitle()
    {
        $title_list = [
            '远方 有一个地方 那里种有我们的梦想',
            '君可见漫天落霞，为伊绽放',
            '此刻鲜花满天幸福在身边',
            '你当我是浮夸吧，夸张只因我很怕',
            '何不把悲哀感觉当作是来自你虚构',
            '怎么会爱上你，我在问自己',
            '拦路雨偏似雪花，饮泣的你冻吗'
        ];

        return $title_list[rand(0, (count($title_list)) - 1)];
    }
}

?>