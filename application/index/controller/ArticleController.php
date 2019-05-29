<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Article;
use app\index\model\Comment;
use app\index\model\UserBackend;

class ArticleController extends Common
{

    protected $needLogin = false;

	public function _initialize()
    {
        parent::_initialize();
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function index()
    {
        $list = Article::getArticles();
        
        return $this->fetch('list', [
            'article_list' => $list,
        ]);
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function info($id)
    {
        $info = Article::get($id);
        $author_info = UserBackend::get($info['author_id']);

        $info['seo_keywords'] = $info['seo_keywords'] ? explode(',', $info['seo_keywords']) : [];
        $info['content']      = htmlspecialchars_decode($info['content']);

        // 上一篇、下一篇
        $prev = Db::table('article')->where('id', '<', $id)->order(['id'=>'desc'])->limit(1)->find();
        $next = Db::table('article')->where('id', '>', $id)->order(['id'=>'asc'])->limit(1)->find();
        if ($prev) {
            $prev['url'] = '/article/info?id=' . $prev['id'];
        }
        if ($next) {
            $next['url'] = '/article/info?id=' . $next['id'];
        }

        // 评论列表
        $comment_list = (new Comment())->getComments(['article_id' => $id]);

        return $this->fetch('lw-article', [
            'prev' => $prev,
            'info' => $info,
            'next' => $next,
            'author_info' => [
                'name' => $author_info['display_name'] ?: '佚名', 
                'my_sign' => $author_info['my_sign'] ?: '桃李不言，下自成蹊。',
                'head_url' => $author_info['head_url'] ?: '/static/chat/img/avatar5.png',                
            ],
            'comment_list' => $comment_list
        ]);
    }

    public function getComments()
    {
        $article_id = $this->request->post('article_id', null);
        $comment_list = (new Comment())->getComments(['article_id' => $article_id]);
        
        ajaxSuccess($comment_list);
    }

    public function comment()
    {
        $content = $this->request->post('content', null);
        $to_id = $this->request->post('to_id', 0);
        $article_id = $this->request->post('article_id', 0);

        if (!$content) {
            ajaxError('评论内容不能为空');
        }

        $model = new Comment();
        $model->uid = $this->userInfo['uid']??0;
        $model->to_id = $to_id;
        $model->article_id = $article_id;
        $model->content = $content;
        $model->like = 0;
        $model->ulike = 0;
        $model->created_time = date('Y-m-d H:i:s');

        if ($model->save()) {
            ajaxSuccess();
        }else{
            ajaxError('评论失败');
        }
    }
}