<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:77:"/mnt/d/Workspace/www/tp5-chat/public/../application/admin/view/tag/index.html";i:1558419610;s:64:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/header.html";i:1558665625;s:68:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/top.html";i:1558406246;s:72:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/sidebar.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/footer.html";i:1558406246;}*/ ?>
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

.tpl-portlet-components{
    min-height: 800px;
}

</style> 

<script type="text/javascript">
    
var API_URL = '';

</script>   

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
                Amaze UI 文字列表
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">Amaze UI CSS</a></li>
                <li class="am-active">文字列表</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 列表
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="/tag/edit" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                            <th class="table-id">ID</th>
                                            <th class="table-title">标签名</th>
                                            <th class="table-title">标签值</th>
                                            <th class="table-title">狀態</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?php echo $tag['id']; ?></td>
                                            <td><?php echo $tag['name']; ?></td>
                                            <td><?php echo $tag['value']; ?></td>
                                            <td>
                                                <div class="tpl-switch">
                                                    <input type="checkbox" id="status" name="status" class="ios-switch bigswitch tpl-switch-btn" checked />
                                                    <div class="tpl-switch-btn-view">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">

                                                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary a-btn" onclick="doEdit(<?php echo $tag['id']; ?>)">
                                                            <!-- <a href="/tag/edit?id=<?php echo $tag['id']; ?>"> -->
                                                            <span class="am-icon-pencil-square-o"></span> 编辑
                                                            <!-- </a> -->
                                                        </a>

                                                        <!-- <a class="am-btn am-btn-default am-btn-xs am-hide-sm-only a-btn" onclick="doCopy(<?php echo $tag['id']; ?>)">
                                                            <span class="am-icon-copy"></span> 复制
                                                        </a> -->

                                                        <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only a-btn" onclick="doDel(<?php echo $tag['id']; ?>)">
                                                            <span class="am-icon-trash-o"></span> 删除
                                                        </a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        
                                    </tbody>
                                </table>
                                <div class="am-cf">

                                    <div class="am-fr">
                                        <!-- 下列生成的代码除上下页按钮 间隔都不对，但是上述代码却没问题，很奇怪，待处理 -->
                                        <?php echo $pager; ?>
                                    </div>

                                    
                                </div>
                                <hr>

                            </form>
                        </div>
                    </div>                    
                </div>
                <div class="tpl-alert"></div>
            </div>
        </div>
    </div>
</body>


<script type="text/javascript">

var API_URL = '';
    
$("#parenttag select").on('change', function(){
    var parent = $(this).val();
    window.location.href = '/tag';
})

function doEdit(id){
    window.location.href = API_URL+'/tag/edit?id='+id;
}

function doDel(id){
    window.location.href = API_URL+'/tag/del?id='+id;
}

function doCopy(id){
    window.location.href = API_URL+'/tag/edit?id='+id;
}

</script>


<script src="/static/blog/admin1/js/app.js"></script>

</html>