<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:80:"/mnt/d/Workspace/www/tp5-chat/public/../application/admin/view/article/edit.html";i:1558419422;s:64:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/header.html";i:1558419499;s:68:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/top.html";i:1558406246;s:72:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/sidebar.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/footer.html";i:1558406246;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>52XUE 管理后台</title>
    <meta name="description" content="52XUE 管理后台">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/static/blog/admin1/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/static/blog/admin1/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/static/blog/admin1/css/amazeui.min.css" />
    <link rel="stylesheet" href="/static/blog/admin1/css/admin.css">
    <link rel="stylesheet" href="/static/blog/admin1/css/app.css">
    <script src="/static/blog/admin1/js/echarts.min.js"></script>
    <!-- 原本放在footer -->
    <script src="/static/blog/admin1/js/jquery.min.js"></script>
    <script src="/static/blog/admin1/js/amazeui.min.js"></script>
        
</head>

<style type="text/css">

.a-btn{
    background-color: #FFF
}

</style> 

<script type="text/javascript">
    
var API_URL = '';

</script>   

<script type="text/javascript" charset="utf-8" src="/static/ueditor/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/ueditor/utf8-php/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/ueditor/utf8-php/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">

.my-badge{
    float: left;
    margin-right: 5px;
    margin-bottom: 5px
}

.md-badge{
    float: left;
    margin-right: 5px;
    margin-bottom: 5px
}

.btn-badge{
    float: left;
    margin-left: 15px;
    margin-bottom: 5px;
}

.my-badge > .am-close{
    font-size: 12px;
    line-height: 1.6;
}

/*.btn-search{
    margin: 5px auto 0 auto;
    margin-left: -5px;
    line-height: 1.2rem;
}*/

.tag-box{
    width: 80%;
    margin: 5px auto 0 auto;
}

/*.am-modal-bd {
    padding: 65px 10px;
}*/


</style>

<body data-type="generalComponents">
    <header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
            <img src="/static/blog/admin1/img/logo.png" alt="">
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="am-icon-bell-o"></span> 提醒 <span class="am-badge tpl-badge-success am-round">5</span></span>
                </a>
                <ul class="am-dropdown-content tpl-dropdown-content">
                    <li class="tpl-dropdown-content-external">
                        <h3>你有 <span class="tpl-color-success">5</span> 条提醒</h3><a href="###">全部</a></li>
                    <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-plus tpl-dropdown-ico-btn-size tpl-badge-success"></span> 【预览模块】移动端 查看时 手机、电脑框隐藏。</a>
                        <span class="tpl-dropdown-list-fr">3小时前</span>
                    </li>
                    <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-check tpl-dropdown-ico-btn-size tpl-badge-danger"></span> 移动端，导航条下边距处理</a>
                        <span class="tpl-dropdown-list-fr">15分钟前</span>
                    </li>
                    <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl"><span class="am-icon-btn am-icon-bell-o tpl-dropdown-ico-btn-size tpl-badge-warning"></span> 追加统计代码</a>
                        <span class="tpl-dropdown-list-fr">2天前</span>
                    </li>
                </ul>
            </li>
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="am-icon-comment-o"></span> 消息 <span class="am-badge tpl-badge-danger am-round">9</span></span>
                </a>
                <ul class="am-dropdown-content tpl-dropdown-content">
                    <li class="tpl-dropdown-content-external">
                        <h3>你有 <span class="tpl-color-danger">9</span> 条新消息</h3><a href="###">全部</a></li>
                    <li>
                        <a href="#" class="tpl-dropdown-content-message">
                            <span class="tpl-dropdown-content-photo">
                  <img src="/static/blog/admin1/img/user02.png" alt=""> </span>
                            <span class="tpl-dropdown-content-subject">
                  <span class="tpl-dropdown-content-from"> 禁言小张 </span>
                            <span class="tpl-dropdown-content-time">10分钟前 </span>
                            </span>
                            <span class="tpl-dropdown-content-font"> Amaze UI 的诞生，依托于 GitHub 及其他技术社区上一些优秀的资源；Amaze UI 的成长，则离不开用户的支持。 </span>
                        </a>
                        <a href="#" class="tpl-dropdown-content-message">
                            <span class="tpl-dropdown-content-photo">
                  <img src="/static/blog/admin1/img/user03.png" alt=""> </span>
                            <span class="tpl-dropdown-content-subject">
                  <span class="tpl-dropdown-content-from"> Steam </span>
                            <span class="tpl-dropdown-content-time">18分钟前</span>
                            </span>
                            <span class="tpl-dropdown-content-font"> 为了能最准确的传达所描述的问题， 建议你在反馈时附上演示，方便我们理解。 </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="am-icon-calendar"></span> 进度 <span class="am-badge tpl-badge-primary am-round">4</span></span>
                </a>
                <ul class="am-dropdown-content tpl-dropdown-content">
                    <li class="tpl-dropdown-content-external">
                        <h3>你有 <span class="tpl-color-primary">4</span> 个任务进度</h3><a href="###">全部</a></li>
                    <li>
                        <a href="javascript:;" class="tpl-dropdown-content-progress">
                            <span class="task">
                    <span class="desc">Amaze UI 用户中心 v1.2 </span>
                            <span class="percent">45%</span>
                            </span>
                            <span class="progress">
                    <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-success" style="width:45%"></div></div>
                </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="tpl-dropdown-content-progress">
                            <span class="task">
                    <span class="desc">新闻内容页 </span>
                            <span class="percent">30%</span>
                            </span>
                            <span class="progress">
                   <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-secondary" style="width:30%"></div></div>
                </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="tpl-dropdown-content-progress">
                            <span class="task">
                    <span class="desc">管理中心 </span>
                            <span class="percent">60%</span>
                            </span>
                            <span class="progress">
                    <div class="am-progress tpl-progress am-progress-striped"><div class="am-progress-bar am-progress-bar-warning" style="width:60%"></div></div>
                </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick">北冥有鱼</span><span class="tpl-header-list-user-ico"> <img src="/static/chat/img/user2-160x160.jpg"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-bell-o"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li><a href="###" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
        </ul>
    </div>
</header>

    <div class="tpl-page-container tpl-page-header-fixed">

        <div class="tpl-left-nav tpl-left-nav-hover">
    <div class="tpl-left-nav-title">
        Amaze UI 列表
    </div>
    <div class="tpl-left-nav-list">
        <ul class="tpl-left-nav-menu">
            <!-- <li class="tpl-left-nav-item">
                <a href="index.html" class="nav-link active">
                    <i class="am-icon-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li class="tpl-left-nav-item">
                <a href="chart.html" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-bar-chart"></i>
                    <span>数据表</span>
                    <i class="tpl-left-nav-content tpl-badge-danger">12</i>
                </a>
            </li>

            <li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>表格</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="table-font-list.html">
                            <i class="am-icon-angle-right"></i>
                            <span>文字表格</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="table-images-list.html">
                            <i class="am-icon-angle-right"></i>
                            <span>图片表格</span>
                            <i class="tpl-left-nav-content tpl-badge-success">18</i>                            
                        </a>

                        <a href="form-news.html">
                            <i class="am-icon-angle-right"></i>
                            <span>消息列表</span>
                            <i class="tpl-left-nav-content tpl-badge-primary">5</i>
                        </a>

                        <a href="form-news-list.html">
                            <i class="am-icon-angle-right"></i>
                            <span>文字列表</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-wpforms"></i>
                    <span>表单</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu" style="display: block;">
                    <li>
                        <a href="form-amazeui.html">
                            <i class="am-icon-angle-right"></i>
                            <span>Amaze UI 表单</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>

                        <a href="form-line.html">
                            <i class="am-icon-angle-right"></i>
                            <span>线条表单</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="tpl-left-nav-item">
                <a href="login.html" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-key"></i>
                    <span>登录</span>
                </a>
            </li> -->
            
            <?php if(is_array($sidebar_menu_list) || $sidebar_menu_list instanceof \think\Collection || $sidebar_menu_list instanceof \think\Paginator): $key = 0; $__LIST__ = $sidebar_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($key % 2 );++$key;?>
            <li class="tpl-left-nav-item">
                <a href="<?php echo $menu['url']; ?>" class="nav-link tpl-left-nav-link-list <?php if($menu['check'] == true): ?>active<?php endif; ?>">
                    <i class="<?php echo $menu['icon']; ?>"></i>
                    <span><?php echo $menu['name']; ?></span>
                    
                    <?php if($menu['children'] == true): ?>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    <?php elseif($menu['message'] != true): ?>
                    <i class="tpl-left-nav-content tpl-badge-<?php echo $menu['message']['color']; ?>"><?php echo $menu['message']['num']; ?></i>
                    <?php endif; ?>
                </a>

                <?php if($menu['children'] == true): ?>
                <ul class="tpl-left-nav-sub-menu" <?php if($menu['check'] == true): ?>style="display: block;"<?php endif; ?>>
                    <li>
                        <?php if(is_array($menu['children']) || $menu['children'] instanceof \think\Collection || $menu['children'] instanceof \think\Paginator): $k = 0; $__LIST__ = $menu['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($k % 2 );++$k;?>
                        <a href="<?php echo $child['url']; ?>" <?php if($child['check'] == true): ?>class="active"<?php endif; ?>>
                            <i class="am-icon-angle-right"></i>
                            <span><?php echo $child['name']; ?></span>
                            <?php if($child['message'] == true): ?>
                            <i class="tpl-left-nav-content tpl-badge-<?php echo $child['color']; ?>"><?php echo $child['num']; ?></i>
                            <?php elseif($k == 1): ?>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            <?php endif; ?>
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </li>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
        
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                Amaze UI 表单
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">表单</a></li>
                <li class="am-active">Amaze UI 表单</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 发表文章
                    </div>
                </div>

                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form tpl-form-line">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form class="am-form am-form-horizontal tpl-form-line-form" id="articleForm" enctype='multipart/form-data'>
                                
                                <input type="hidden" id="id" name="id" value="<?php if($article_info == true): ?><?php echo $article_info['id']; endif; ?>">

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="title" name="title" placeholder="文章名称" value="<?php if($article_info == true): ?><?php echo $article_info['title']; endif; ?>">
                                        <small>输入文章标题。</small>
                                    </div>
                                </div> 
                                <!-- 1=普通文章，2=菜谱，3=新闻，4=技术文章 -->

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">文章分类 </label>
                                    <div class="am-u-sm-9">
                                        <select name="type" data-am-selected="{searchBox: 1}">
                                          <option value="1" <?php if($article_info == true && 1 == $article_info['type']): ?>selected="selected"<?php endif; ?>>心情</option>
                                          <option value="2" <?php if($article_info == true && 2 == $article_info['type']): ?>selected="selected"<?php endif; ?>>新闻</option>
                                          <option value="3" <?php if($article_info == true && 3 == $article_info['type']): ?>selected="selected"<?php endif; ?>>菜谱</option>
                                          <option value="4" <?php if($article_info == true && 4 == $article_info['type']): ?>selected="selected"<?php endif; ?>>技术</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">文章标签 </label>
                                    <input type="hidden" id="category" name="category" value="<?php if($article_info == true): ?><?php echo $article_info['category']; endif; ?>">
                                    <div class="am-u-sm-9">
                                        <?php if($article_info == true): if(is_array($article_info['category_list']) || $article_info['category_list'] instanceof \think\Collection || $article_info['category_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article_info['category_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                        <i class="tpl-left-nav-content tpl-badge-secondary my-badge"><?php echo $category; ?></i>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                        <a class="tpl-left-nav-content tpl-badge-danger btn-badge btn-substract">-</a>
                                        <a class="tpl-left-nav-content tpl-badge-danger btn-badge btn-yes" style="display: none">√</a>
                                        <a class="tpl-left-nav-content tpl-badge-primary btn-badge btn-add" id="doc-prompt-toggle">+</a>
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">首页推荐</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" id="index" name="index" class="ios-switch bigswitch tpl-switch-btn" <?php if($article_info == true && $article_info['index'] == 1): ?>checked<?php endif; ?>/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">热门文章</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" id="hot" name="hot" class="ios-switch bigswitch tpl-switch-btn" <?php if($article_info == true && $article_info['hot'] == 1): ?>checked<?php endif; ?>/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">副标题</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="sub_title" name="sub_title" placeholder="副标题" value="<?php if($article_info == true): ?><?php echo $article_info['sub_title']; endif; ?>">
                                        <small>输入文章副标题。</small>
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">描述</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="slogan" name="slogan" placeholder="描述" value="<?php if($article_info == true): ?><?php echo $article_info['slogan']; endif; ?>">
                                        <small>输入一段描述文字</small>
                                    </div>
                                </div>  
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">封面图片</label>
                                    <div class="am-u-sm-9">
                                        
                                        <input type="text" id="cover_image" name="cover_image" value="<?php if($article_info == true): ?><?php echo $article_info['cover_image']; else: ?>/static/blog/admin1/img/a5.png<?php endif; ?>">
                                        <br>
                                        <div class="am-form-group am-form-file">

                                            <div class="tpl-form-file-img" id="doPreview" if $article_info neq true}style="display: none;"{/if}>
                                                <img src="<?php if($article_info == true): ?><?php echo $article_info['cover_image']; else: ?>/static/blog/admin1/img/a5.png<?php endif; ?>" alt="">
                                            </div>

                                            <button type="button" id="uploadBtn" class="am-btn <?php if($article_info): ?>am-btn-primary<?php else: ?>am-btn-default<?php endif; ?> am-btn-sm">
                                                <i class="am-icon-cloud-upload"></i> <?php if($article_info): ?>重新选择图片<?php else: ?>选择要上传的图片<?php endif; ?>
                                            </button>
                                            <input type="file" name="images" multiple="multipart/form-data" onchange="showPreview(this)">
                                        </div>                                        
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">正文</label>
                                    <div class="am-u-sm-9">
                                        <script id="editor" type="text/plain" style="width:100%;height:500px;"><?php if($article_info == true): ?><?php echo $article_info['content']; endif; ?></script>
                                        <input type="hidden" id="content" name="content" value="">
                                    </div>
                                </div> 
                                
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="button" class="am-btn am-btn-default" id="saveBtn">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">搜索标签</div>
    <div class="am-modal-bd">
        <!-- 如果找不到，请添加。 -->       
        
        <input type="text" class="am-modal-prompt-input" id="in-search" style="display: inline-block!important" placeholder="搜索...">
        
        <div class="tag-box">

        </div>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn modal-cancel" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn modal-confirm" data-am-modal-confirm>选中</span>
    </div>
  </div>
</div>

<script type="text/javascript">

// 实例化编辑器
// 建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor', {toolbars: [[
    // 'anchor', //锚点
    // 'undo', //撤销
    // 'redo', //重做
    'bold', //加粗
    'italic', //斜体
    'underline', //下划线
    'strikethrough', //删除线
    // 'subscript', //下标
    // 'fontborder', //字符边框
    // 'superscript', //上标
    // 'formatmatch', //格式刷
    // 'source', //源代码
    // 'blockquote', //引用
    // 'pasteplain', //纯文本粘贴模式
    // 'selectall', //全选
    // 'print', //打印
    'preview', //预览
    'horizontal', //分隔线
    // 'removeformat', //清除格式
    // 'time', //时间
    // 'date', //日期
    // 'unlink', //取消链接
    // 'insertrow', //前插入行
    // 'insertcol',//前插入列
    // 'mergeright', //右合并单元格
    // 'mergedown', //下合并单元格
    // 'deleterow', //删除行
    // 'deletecol', //删除列
    // 'splittorows', //拆分成行
    // 'splittocols', //拆分成列'splittocells', 

    //完全拆分单元格'deletecaption', //删除表格标题'inserttitle', //插入标题'mergecells', //合并多个单元格'deletetable', //删除表格'cleardoc', //清空文档'insertparagraphbeforetable', //"表格前插入行"
    
    'insertcode', //代码语言
    'fontfamily', //字体
    'fontsize', //字号
    'forecolor', //字体颜色
    // 'paragraph', //段落格式
    'simpleupload', //单图上传
    'insertimage', //多图上传
    'snapscreen', //截图
    // 'edittable', //表格属性
    // 'edittd',  //单元格属性
    'link', //超链接
    'emotion', //表情
    'spechars', //特殊字符'searchreplace', //查询替换'map', //Baidu地图'gmap', //Google地图'insertvideo', //视频
    // 'help', //帮助
    'indent', //首行缩进
    'justifyleft', //居左对齐
    'justifyright', //居右对齐
    'justifycenter', //居中对齐
    'justifyjustify', //两端对齐
    'backcolor', //背景色
    'insertorderedlist', //有序列表
    'insertunorderedlist',//无序列表
    'fullscreen', //全屏'directionalityltr', //从左向右输入'directionalityrtl', //从右向左输入'rowspacingtop', //段前距'rowspacingbottom', //段后距'pagebreak', //分页'insertframe',

    //插入Iframe'imagenone', //默认'imageleft', //左浮动'imageright', //右浮动'attachment', //附件'imagecenter', //居中'wordimage', //图片转存'lineheight', //行间距'edittip ', //编辑提示'customstyle', 

    //自定义标题
    // 'autotypeset', //自动排版'webapp', //百度应用
    // 'touppercase', //字母大写
    // 'tolowercase', //字母小写'background', //背景'template', //模板'scrawl', //涂鸦'music', //音乐'inserttable',

    //插入表格'drafts', // 从草稿箱加载
    // 'charts', // 图表
 ]]});
// 獲取編輯器文本內容
function getContent() {
    return UE.getEditor('editor').getContent();
}

$(".btn-substract").click(function(){
    $(".my-badge").append('<a href="#" class="am-close">&times;</a>');
    $(this).hide();
    $(".btn-yes").show();
})

$(".btn-yes").click(function(){
    $(".my-badge .am-close").remove();
    // TODO
    $(this).hide();
    $(".btn-substract").show();
})

$(".my-badge").on('click', '.am-close', function(){
    $(this).parent().remove();
})

// 获取input 元素,并实时监听用户输入
$("#in-search").bind('input propertychange', function()
{
    var keyword = $(this).val();
    var current = $("#category").val();
    if (keyword == '') {
        modalRender();
        return;
    }

    $.ajax({
        url:API_URL+'/tag/doSearch',
        type:'POST',
        data:{"keyword":keyword, "current":current},
        dataType:'json',
        success:function(res) {
            if (res.code == 200) {
                var data = res.data;
                var len  = data.length;

                if (len) {

                    var html = '';
                    for (var i = 0; i < len; i++) {
                        html += '<a class="tpl-left-nav-content tpl-badge-secondary md-badge">' + data[i].name + '</a>';
                    }

                    modalRender(html, '选中', '65px');
                }else{
                    modalRender('<em>暂无</em>', '新增并选中');
                }
            }else{  
                modalRender();
            }
        }
    })
})

// 选中的标签变色并且打钩
$(".tag-box").on('click', '.md-badge', function(){
    if (!$(this).hasClass('tpl-badge-danger')) {
        $(this).removeClass('tpl-badge-secondary').addClass('tpl-badge-danger');
        $(this).append('<i>√</i>');
    }else{
        $(this).removeClass('tpl-badge-danger').addClass('tpl-badge-secondary');
        $(this).find('i').remove();
    }
})

// 点击选中保存 组件自带
$(function() {
    $('#doc-prompt-toggle').on('click', function() {
        $('#my-prompt').modal({
            relatedTarget: this,
            onConfirm: function(e) {
                // 清空弹出层的值
                modalReset();
            },
            onCancel: function(e) {
                modalReset();                
            }
        });
    });
});

// 选中保存时改变隐藏的输入框
$(".btn-yes").on('click', function(){    
    categoryRender();
})

// 点击选中保存
$(".modal-confirm").on('click', function(){

    if ($("#in-search").val() == '') {
        return false;
    }

    if ($(this).text() == '新增并选中') {
        var tag = $("#in-search").val();
        addTags(tag);   
        $(".btn-substract").before('<i class="tpl-left-nav-content tpl-badge-secondary my-badge">'+tag+'</i>');     
    }else{
        // 将选中的值渲染到页面
        $(".tag-box").find('i').each(function(){

            if ($(this).find('i')) {
                var tag = $(this).parent().text();
                var tag = tag.split('√')[0];

                $(".btn-substract").before('<i class="tpl-left-nav-content tpl-badge-secondary my-badge">'+tag+'</i>');
            }                
        })
    }

    // 表单隐藏输入框的值重新获取
    categoryRender();
})

// 新增标签
function addTags(tagName)
{
    $.ajax({
        url:API_URL+'/tag/save',
        type:'POST',
        data:{"name":tagName},
        dataType:'json',
        success:function(res) {
            if (res.code == 200) {
                // TODO
            }
        }
    })
}

function categoryRender()
{
    var tags = [];
    $(".my-badge").each(function(){
        tags.push($(this).text());
    })

    $("#category").val(tags.join(';'));
}

function modalReset()
{
    modalRender();
    $("#in-search").val('');
}

function modalRender(html = '', btnName = '选中', padBtm = '15px')
{    
    // if ($(".tag-box").find(".md-badge")) {
    //     $(".tag-box").find(".md-badge").each(function(){
    //         if (!$(this).hasClass(".tpl-badge-danger")) {
    //             $(this).remove();
    //         }
    //     });

    //     $(".tag-box").prepend(html);
    // }else{
    //     $(".tag-box").html(html);
    // }
    // 目前只能单选，不想做多选。。。TODO
    $(".tag-box").html(html);
    $(".am-modal-bd").css('padding-bottom', padBtm);
    $(".modal-confirm").text(btnName);
}

var API_URL = '';

$("#saveBtn").on('click', function(){
    $("#content").val(getContent());

    var data = $("#articleForm").serialize();
// console.log(data);return;
    $.ajax({
        url:API_URL+'/article/save',
        type:'POST',
        data:data,
        dataType:'json',
        success:function(res) {
            if (res.code == 200) {
                window.location.href = API_URL+'/article';
            }else{  
                alert(res.msg)
            }
        }
    })
})

// var uploading = false;

function showPreview(obj){    
    var fileData = obj.files[0];
    var formData = new FormData();
    formData.append("images", fileData);
    formData.append("type", 'article');

    // if(uploading){
    //     alert("头像正在上传中，请稍候");
    //     return false;
    // }

    if (!verifyPicFile(obj)) {
        // do something
    }

    $.ajax({
        url: API_URL + "/upload/uploadPic",
        type: 'POST',
        cache: false,
        data: formData,
        processData: false,
        contentType: false,
        dataType:"json",
        beforeSend: function(){
            uploading = true;
        },
        success : function(res) {
            if (res.code == 200) {
                $("#doPreview img").attr("src", res.data.img_url);
                $("#doPreview").show();
                $("#cover_image").val(res.data.img_url);

                // 按钮样式
                $("#uploadBtn").removeClass("am-btn-default").addClass("am-btn-primary");
            } else {
                showError(res.data.msg);
                // 按钮样式
                $("#uploadBtn").removeClass("am-btn-default").addClass("am-btn-danger");                
            }

            $("#uploadBtn").html('<i class="am-icon-cloud-upload"></i> 重新选择图片');         
        }
    });
}

//图片尺寸验证
function verifyPicFile(file) {
    var filePath = file.value;
    if(filePath){
        //读取图片数据
        var filePic = file.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            //加载图片获取图片真实宽度和高度
            var image = new Image();
            image.onload=function(){
                var width = image.width;
                var height = image.height;
                if (width/height == 16/9){
                    //  do nothing
                }else {
                    alert("图片宽高比例应为：16:9，建议上传1920*1280尺寸的图片");
                    file.value = "";
                    return false;
                }
            };
            image.src= data;
        };
        reader.readAsDataURL(filePic);
    }else{
        return false;
    }
}

</script>


<script src="/static/blog/admin1/js/app.js"></script>

</html>