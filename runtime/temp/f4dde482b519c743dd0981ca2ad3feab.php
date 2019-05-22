<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:86:"/mnt/d/Workspace/www/tp5-chat/public/../application/index/view/article/lw-article.html";i:1558406246;s:64:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/header.html";i:1558431497;s:68:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/nav.html";i:1558406246;s:72:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/sidebar.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/footer.html";i:1558406246;}*/ ?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $settingInfo['website.Desc']; ?>">
  <meta name="keywords" content="<?php echo $settingInfo['website.Keywords']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $settingInfo['website.Title']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="/static/blog/assets/i/favicon.png">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/static/blog/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/static/blog/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileImage" content="/static/blog/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/static/blog/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/static/blog/assets/css/app.css">

  <link rel="stylesheet" type="text/css" href="/static/css/wordbox.css">
  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="/static/blog/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/wordbox.js"></script>
  <!--<![endif]-->
  <!--[if lte IE 8 ]>
  <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
  <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
  <![endif]-->
</head>

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="<?php echo $settingInfo['website.LOGO']; ?>" alt="52XUE Logo"/>
        <h2 class="am-hide-sm-only"><?php echo $settingInfo['website.Slogan']; ?></h2>
    </div>
</header>
<hr>

<style type="text/css">
  /*body{
      background-color: #eff4f;
  }*/

  a{
    color: #000;
  }

  a, p, span{
    font-size: 14px;
  }

  h1, .h1{
    font-size: 24px;
    font-weight: 600;
  }
</style>

<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      
        <?php foreach($menu_list as $menu): ?>

        <li <?php if($menu['children'] == true): ?> class="am-dropdown" data-am-dropdown <?php endif; ?>>
            <a <?php if($menu['children'] == true): ?> class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"<?php else: ?> href="<?php echo $menu['url']; ?>"<?php endif; ?>>
                <?php echo $menu['name']; if($menu['children'] == true): ?> <span class="am-icon-caret-down"></span><?php endif; ?>
            </a>
            <?php if($menu['children'] == true): ?>
            <ul class="am-dropdown-content">
                <?php foreach($menu['children'] as $child): ?>
                <li><a href="<?php echo $child['url']; ?>"><?php echo $child['name']; ?></a></li> 
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </li>

        <?php endforeach; ?>
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
      </div>
    </form>
  </div>
</nav>

<hr>
<!-- nav end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-md-8 am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center"><?php echo $info['title']; ?></h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="#" class="blog-color"><?php echo $author_info['name']; ?> &nbsp;</a></span>-
              <!-- <span><a href="#">@amazeUI &nbsp;</a></span>- -->
              <span><a href="#"><?php echo $info['created_time']; ?></a></span>
          </p>
        </div>

        <div class="am-article-bd">
        <?php echo $info['content']; ?>
        </div>
      </article>
        
        <div class="am-g blog-article-widget blog-article-margin">
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <?php if($info['seo_keywords'] == true): ?>
            <span class="am-icon-tags"> &nbsp;</span>
            <?php if(is_array($info['seo_keywords']) || $info['seo_keywords'] instanceof \think\Collection || $info['seo_keywords'] instanceof \think\Paginator): $key = 0; $__LIST__ = $info['seo_keywords'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$keyword): $mod = ($key % 2 );++$key;if($key != 1): ?>|<?php endif; ?>
            <a href="#"><?php echo $keyword; ?></a>
            <!-- <a href="#">TAG</a> , 
            <a href="#">啦啦</a> -->
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <hr>
            <?php endif; ?>
            <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
            <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
            <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
          </div>
        </div>

        <hr>
        <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="<?php echo $author_info['head_url']; ?>" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color"><?php echo $author_info['name']; ?></span></h3>
            <p><?php echo $author_info['my_sign']; ?></p>
          </div>
        </div>
        <hr>
        <ul class="am-pagination blog-article-margin">
          <?php if($prev == true): ?>
          <li class="am-pagination-prev"><a href="<?php echo $prev['url']; ?>" class="">&laquo; <?php echo $prev['title']; ?></a></li>
          <?php endif; if($next == true): ?>
          <li class="am-pagination-next"><a href="<?php echo $next['url']; ?>"><?php echo $next['title']; ?> &raquo;</a></li>
          <?php endif; ?>
        </ul>
        
        <hr>

        <!-- <article class="am-comment">
          <a href="#link-to-user-home">
            <img src="" alt="" class="am-comment-avatar" width="48" height="48"/>
          </a>

          <div class="am-comment-main">
            <header class="am-comment-hd">
              <div class="am-comment-meta">
                <a href="#link-to-user" class="am-comment-author">某人</a>
                评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
              </div>
            </header>

            <div class="am-comment-bd">
              ...
            </div>
          </div>
        </article> -->

        <ul class="am-comments-list am-comments-list-flip">

          <?php if(is_array($comment_list) || $comment_list instanceof \think\Collection || $comment_list instanceof \think\Paginator): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?>
          <li class="am-comment">
            <a href="#link-to-user-home">
              <img src="<?php echo $comment['head_url']; ?>" alt="" class="am-comment-avatar" width="48" height="48"/>
            </a>

            <div class="am-comment-main">
              <header class="am-comment-hd">
                <div class="am-comment-meta">
                  <a href="#link-to-user" class="am-comment-author"><?php echo $comment['name']; ?></a>
                  评论于 <time datetime="<?php echo $comment['created_time']; ?>" title="<?php echo $comment['created_time']; ?>"><?php echo $comment['created_time']; ?></time>
                </div>
              </header>

              <div class="am-comment-bd">
                <?php echo $comment['content']; ?>
              </div>
            </div>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>

        <form class="am-form am-g" id="commentForm">
            <h3 class="blog-comment">评论</h3>
          <fieldset>
            <!-- <div class="am-form-group am-u-sm-4 blog-clear-left">
              <input type="text" class="" placeholder="名字">
            </div>
            <div class="am-form-group am-u-sm-4">
              <input type="email" class="" placeholder="邮箱">
            </div>

            <div class="am-form-group am-u-sm-4 blog-clear-right">
              <input type="password" class="" placeholder="网站">
            </div> -->

            <input type="hidden" name="article_id" value="<?php echo $info['id']; ?>">
        
            <div class="am-form-group">
              <textarea class="" id="contentArea" name="content" rows="5" placeholder="按个爪~"></textarea>
            </div>
        
            <p><button type="button" id="btnComment" class="am-btn am-btn-default">发表评论</button></p>
          </fieldset>
        </form>

        <hr>
    </div>

    <style type="text/css">
.box-wrap{width:100%;height:380px;}
</style>
    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>我</span></h2>
            <!-- <img src="/static/blog/assets/i/f14.jpg" alt="about me" class="blog-entry-img" >
            <p>妹纸</p>
            <p>
            我是妹子UI，中国首个开源 HTML5 跨屏前端框架
            </p>
            <p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p> -->

            <div class="am-u-sm-12 blog-clear-padding am-u-sm-centered">
                <?php if($user_info == true): ?>
                <img src="<?php echo $user_info['head_url']; ?>" alt="about me" class="blog-entry-img" >
                <p><?php echo $user_info['nick_name']; ?></p>
                <?php echo $user_info['my_sign']; else: ?>
                <h3>登录/<a>注册</a></h3>
                <hr>
                <br>

                <div class="am-cf">
                    <a href="/login" class="am-btn am-btn-primary am-btn-sm am-fl">去登录</a>
                    <a href="/register" class="am-btn am-btn-default am-btn-sm am-fr">去注册</a>
                </div>
                <br>
                <?php endif; ?>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>联系站长</span></h2>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href="https://github.com/foreverly" target="_blank"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <!-- <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a> -->
                <!-- <a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a> -->
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>热门标签</span></h2>
            <div class="am-u-sm-12 blog-clear-padding box-wrap">
                <!-- <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                <a href="#" class="blog-tag"><?php echo $tag['name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?> -->
                <div id="box-responsive" class="wordbox"></div>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>热门文章</span></h2>
            <ul class="am-list">
                <?php if(is_array($hot_articles) || $hot_articles instanceof \think\Collection || $hot_articles instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

<script type="text/javascript">
$(function() {

    var titles = [];
    var urls = [];
    var tag_list = <?php echo $tag_list; ?>;
    var len = tag_list.length;

    for (var i = 0; i < len; i++) {
        titles.push(tag_list[i].name);
        urls.push(tag_list[i].url);
    }

    renderTags(titles, urls);

    // ajax请求速度太慢，需优化，暂不用
    // $.ajax({
    //     type:"POST",
    //     data:{},
    //     dataType:'json',
    //     url:'/index/getTags',
    //     success:function(res){
    //         if (res.code == 200) {
    //             var data = res.data;
    //             var len = data.length;

    //             for (var i = 0; i < len; i++) {
    //                 titles.push(data[i].name);
    //                 urls.push(data[i].url);
    //             }

    //             renderTags(titles, urls);
    //         }            
    //     }
    // });

    function renderTags(titles, urls)
    {
        var words = [];
        for(var i = 0; i < titles.length; i++) {
            words[i] = {
                'title' : titles[i],
                'url' : urls[i]
            }
        }
        var colors1 = ['#F46779', '#045DA4'];    
        var colors2 = ['#D59A3E', '#C58B59'];    
        var colors3 = ['#49B4E0', '#FCBDA2', '#EBADBD', '#D5C2AF', '#C0BDE5', '#CBCC7F', '#FFDA7F', '#8dd0c3', '#bbbfc6', '#a4d9ef', '#bbdb98'];

        // responsive
        // 响应式wordbox需要有外层嵌套div
        
        var wb1 = new WordBox('#box-responsive', {
            isLead: false,          //是否包含“全部”分类  
            isRand: false,          //是否随机排列数组元素  
            leadWord: null,
            words: words,
            colors: colors3,
            borderWidth: 2,
            isFixedWidth: false
        });

        // // fixed width
        // $('#box-fixedWidth1').wordbox({
        //     isLead: false,    
        //     leadWord: null,
        //     words: words,
        //     colors: colors2,
        //     borderWidth: 2,
        //     isFixedWidth: true,
        //     width: 800,
        //     height: 200
        // });

        // $('#box-fixedWidth2').wordbox({
        //     isLead: true,          
        //     leadWord: {'title': '全部', 'url': 'http://www.17sucai.com/','title': 'css', 'url': 'http://www.baidu.com/','title': 'JavaScript', 'url': 'http://www.jquery.com/'},
        //     words: words,
        //     colors: colors3,
        //     borderWidth: 2,
        //     isFixedWidth: true,
        //     width: 280,
        //     height: 300
        // });


        // // 鼠标浮动加下划线
        // $('.box a').hover(function(event) {            
        //     $(this).css({'text-decoration': 'underline'});
        //     event.stopPropagation();
        // }, function(event) {
        //     $(this).css({'text-decoration': 'none'});
        //     event.stopPropagation();
        // });
        // // 鼠标浮动字体变大
        // var fontSize = $('#box-responsive').css('font-size');
        // $('#box-fixedWidth1 .box a').hover(function(event) {  
        //     $(this).css({'font-size': '1.4em'});
        //     event.stopPropagation();
        // }, function(event) {
        //     $(this).css({'font-size': fontSize});
        //     event.stopPropagation();
        // });
    }
});
 </script>
</div>
<!-- content end -->

<script type="text/javascript">

$("#btnComment").on('click', function(){

  $.ajax({
    type:'POST',
    data:$("#commentForm").serialize(),
    dataType:'json',
    url:'/article/comment',
    success:function(res){
      if (res.code == '200') {
        getComments();
      }else{
        alert(res.msg)
      }
    }
  })
})

getComments();

function getComments(){
  var article_id = "<?php echo $info['id']; ?>";
  $.ajax({
    type:'POST',
    data:"article_id="+article_id,
    dataType:'json',
    url:'/article/getComments',
    success:function(res){
      if (res.code == '200') {

        var commentHtml = '';
        var data = res.data;
        for (var i = 0; i < data.length; i++) {
          commentHtml += '<li class="am-comment">';
          commentHtml += '<a href="#link-to-user-home">';
          commentHtml += '<img src="'+data[i].head_url+'" alt="" class="am-comment-avatar" width="48" height="48"/>';
          commentHtml += '</a>';
          commentHtml += '<div class="am-comment-main">';
          commentHtml += '<header class="am-comment-hd">';
          commentHtml += '<div class="am-comment-meta">';
          commentHtml += '<a href="#link-to-user" class="am-comment-author">'+data[i].name+'</a>';
          commentHtml += '评论于 <time datetime="'+data[i].created_time+'" title="'+data[i].created_time+'">'+data[i].created_time+'</time>';
          commentHtml += '</div>';
          commentHtml += '</header>';
          commentHtml += '<div class="am-comment-bd">' + data[i].content;
          commentHtml += '</div></div></li>';
        }

        $(".am-comments-list").html(commentHtml);
        $("#contentArea").val('')
      }else{
        alert(res.msg)
      }
    }
  }) 
}

</script>

<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>君子和而不同</h3>
            <p class="am-text-sm">
                大学之道，在明明德，在亲民，在止于至善。
                知止而后有定，定而后能静，静而后能安，安而后能虑，虑而后能得。 
                物有本末，事有终始，知所先后，则近道矣。<br><br>
                古之欲明明德于天下者，先治其国，欲治其国者，先齐其家；欲齐其家者，先修其身；欲修其身者，先正其心；欲正其心者，先诚其意；欲诚其意者，先致其知，致知在格物。
                物格而后知至，知至而后意诚，意诚而后心正，心正而后身修，身修而后家齐，家齐而后国治，国治而后天下平。              
            </p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-reddit am-icon-fw blog-icon blog-icon"></span></a>
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon blog-icon"></span></a>
            </p>
            <h3>Credits</h3>
            <p>纵追求卓越，然时间、经验、能力有限。有很多不足的地方，希望大家包容、不吝赐教，给我提意见、建议。感谢你们！</p>          
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
              <h1>友情链接</h1>
             <h3>Links</h3>
            <p>
                <ul>
                    <li><a href="http://www.baidu.com" target="_blank">百度</a></li>
                    <li><a href="http://www.zylin.cn/" target="_blank">杨林</a></li>
                    <li>...</li>
                </ul>
            </p>
        </div>
    </div>    
    <div class="blog-text-center">© 2015 AllMobilize, Inc. Licensed under MIT license. Made with love By LWXYFER</div>    
</footer>






<script src="/static/blog/assets/js/amazeui.min.js"></script>


</body>
</html>