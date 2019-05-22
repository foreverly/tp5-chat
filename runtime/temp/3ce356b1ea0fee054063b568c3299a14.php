<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:82:"/mnt/d/Workspace/www/tp5-chat/public/../application/index/view/index/lw-index.html";i:1558406246;s:64:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/header.html";i:1558431373;s:68:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/nav.html";i:1558406246;s:72:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/sidebar.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/index/view/layout/footer.html";i:1558406246;}*/ ?>
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


<!-- banner start -->
<div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
    <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
    <ul class="am-slides">
        <?php foreach($rotation_list as $rotation): ?>
        <li>
            <img src="<?php echo $rotation['picture']; ?>">
            <!-- <div class="blog-slider-desc am-slider-desc ">
                <div class="blog-text-center blog-slider-con">
                    <span><a href="" class="blog-color"><?php echo $rotation['author']; ?> &nbsp;</a></span>               
                    <h1 class="blog-h-margin"><a href=""><?php echo $rotation['title']; ?></a></h1>
                    <p><?php echo $rotation['slogan']; ?></p>
                    <br><br><br><br><br><br><br>                
                </div>
            </div> -->
        </li>
        <?php endforeach; ?>
    </ul>
    </div>
</div>
<!-- banner end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12" id="artBox">


        <?php foreach($article_list as $article): ?>
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="<?php echo $article['cover_picture']; ?>" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span><a href="" class="blog-color"><?php echo $article['author']; ?> &nbsp;</a></span>
                <span> <?php echo $article['from']; ?> &nbsp;</span>
                <span><?php echo $article['time']; ?></span>
                <h1><a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></h1>
                <p><?php echo $article['slogan']; ?></p>
                <p><a href="<?php echo $article['url']; ?>" class="blog-continue">continue reading</a></p>
            </div>
        </article>
        <?php endforeach; ?>
        
        <ul class="am-pagination">
            <li class="am-pagination-prev" <?php if($page-1 <= 0): ?>style="display:none"<?php endif; ?>><a href="javascript:goArticlePage(<?php echo $page-1; ?>);">&laquo; Prev</a></li>
            <li class="am-pagination-next" <?php if($page+1 >= $totalPage): ?>style="display:none"<?php endif; ?>><a href="javascript:goArticlePage(<?php echo $page+1; ?>);">Next &raquo;</a></li>
        </ul>
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
    
function goArticlePage(page)
{
    $.ajax({
        url:'/index/getArticles',
        type:'POST',
        data:{'page':page},
        dataType:'json',
        success:function(res){
            if (res.code = '200') {

                var data = res.data;
                var html = '';
                var prev = page - 1;
                var next = page + 1;
                var total= <?php echo $totalPage; ?>;

                // 文章列表主体
                for (var i = 0; i < data.length; i++) {
                    html += '<article class="am-g blog-entry-article">';
                    html += '<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">';
                    html += '<img src="'+data[i].cover_picture+'" alt="" class="am-u-sm-12">';
                    html += '</div>';
                    html += '<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">';
                    html += '<span><a href="" class="blog-color">'+data[i].author+' &nbsp;</a></span';
                    html += '<span> '+data[i].from+' &nbsp;</span>';
                    html += '<span>'+data[i].time+'</span>';
                    html += '<h1><a href="'+data[i].url+'"><?php echo $article['title']; ?></a></h1>';
                    html += '<p>'+data[i].slogan+'</p>';
                    html += '<p><a href="'+data[i].url+'" class="blog-continue">continue reading</a></p>';
                    html += '</div>';
                    html += '</article>';
                }

                // 上一页与下一页
                html += '<ul class="am-pagination">';
                html += '<li class="am-pagination-prev" ';
                if (prev < 1) {
                    html += 'style="display:none"';
                }
                html += '><a href="javascript:goArticlePage('+prev+');">&laquo; Prev</a></li>';
                html += '<li class="am-pagination-next" ';
                if (next > total) {
                    html += 'style="display:none"';
                }
                html += '><a href="javascript:goArticlePage('+next+');" disabled="disabled">Next &raquo;</a></li>';                
                html += '</ul>';

                $("#artBox").html(html);
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