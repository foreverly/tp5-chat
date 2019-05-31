<?php
namespace app\common\service\app;

use think\Session;
use think\Request;
use app\common\model\ArticleCategory;

/**
 * Category服务层
 */
class ArticleCategoryService
{	
	public static function getCategories()
    { 	
        $res = ArticleCategory::getAll("*", ['status' => 1], "id asc");

        $list = [];
        foreach ($res as $key => $value) {

            $value = $value->hidden(['status'])->toArray();            

            if ($value['pid'] == 0) {
                $value['children'] = [];
                $value['url'] = '/article/category?tid=' . $value['id'];
                $list[$value['id']] = $value;
            }else{
                $value['url'] = '/article/category?tid=' . $value['pid'] . "&cid=" . $value['id'];
                $list[$value['pid']]['children'][] = $value;
            }
        }
        
        return array_values($list);
    }

    public static function getPageHtml($totalPage, $page = 1, $size = 10, $offset = 2)
    {
        $request = Request::instance();
        $base_url = $request->baseUrl();
        $params = $request->param();
        $params['page'] = $page;
        
        $url = $base_url . "?" . http_build_query($params);
        
        $html = "";
        if ($page > 1) {
            $params['page'] = $page - 1;
            $url = $base_url . "?" . http_build_query($params);
            $html .= '<li class="am-pagination-prev"><a href="' . $url . '">&laquo; Prev</a></li>';
        }

        $os = 0;
        // 当前页之前的
        for ($i = $page - $offset; $i < $page; $i++) {
            if ($os < 2 && $i > 0) {
                $params['page'] = $i;
                $url = $base_url . "?" . http_build_query($params);
                $html .= '<li class=""><a href="' . $url . '">' . $i . '</a></li>';
                $os++;
            }
        }

        // 当前页
        $html .= '<li class="am-active"><a href="#" disabled="disabled">' . $page . '</a></li>';

        // 当前页之后的
        for ($j = ($page+1); $j < $totalPage; $j++) {
            // 当前页左右2侧加起来有4页
            if ($os < 4) {
                $params['page'] = $j;
                $url = $base_url . "?" . http_build_query($params);
                $html .= '<li class=""><a href="' . $url . '">' . $j . '</a></li>';
                $os++;
            }
        }

        if ($page < $totalPage) {
            $params['page'] = $page + 1;
            $url = $base_url . "?" . http_build_query($params);
            $html .= '<li class="am-pagination-next"><a href="' . $url . '">Next &raquo;</a></li>';
        }

        return $html;
    }
}