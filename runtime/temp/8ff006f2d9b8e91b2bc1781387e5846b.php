<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:81:"/mnt/d/Workspace/www/tp5-chat/public/../application/admin/view/setting/index.html";i:1558490280;s:64:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/header.html";i:1558665718;s:68:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/top.html";i:1558406246;s:72:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/sidebar.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/footer.html";i:1558406246;}*/ ?>
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
    min-height: 500px;
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
                        <span class="am-icon-code"></span> 表单
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
                        <div class="tpl-form-body tpl-form-line">
                            <form class="am-form tpl-form-line-form" id="settingForm">

                                <!-- <hr> -->
                                
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label"><h5>微信公众号配置</h5></label>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">开发者ID <span class="tpl-form-line-small-title">AppID</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="wechat.AppID" name="wechat.AppID" placeholder="AppID" value="<?php echo $settingInfo['wechat.AppID']; ?>">
                                        <small>请填写开发者ID。</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">开发者密码 <span class="tpl-form-line-small-title">AppSecret</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="wechat.AppSecret" name="wechat.AppSecret" placeholder="AppSecret" value="<?php echo $settingInfo['wechat.AppSecret']; ?>">
                                        <small>请填写开发者密码。</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">开发者令牌 <span class="tpl-form-line-small-title">Token</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="wechat.Token" name="wechat.Token" placeholder="Token" value="<?php echo $settingInfo['wechat.Token']; ?>">
                                        <small>请填写开发者令牌。</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">消息加密密钥 <span class="tpl-form-line-small-title">EncodingAESKey</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="wechat.EncodingAESKey" name="wechat.EncodingAESKey" placeholder="EncodingAESKey" value="<?php echo $settingInfo['wechat.EncodingAESKey']; ?>">
                                        <small>请填写消息加密密钥。</small>
                                    </div>
                                </div>

                                <hr>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label"><h5>网站配置</h5></label>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站标题 <span class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="website.Title" name="website.Title" placeholder="Title" value="<?php echo $settingInfo['website.Title']; ?>">
                                    </div>
                                </div>

                                <!-- <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">网站描述</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="10" id="website.Desc" placeholder="请输入网站描述" name="website.Desc"><?php echo $settingInfo['website.Desc']; ?></textarea>
                                    </div>
                                </div> -->

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label">网站描述 <span class="tpl-form-line-small-title">Desc</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" placeholder="请输入网站描述" name="website.Desc" value="<?php echo $settingInfo['website.Desc']; ?>">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label">SEO <span class="tpl-form-line-small-title">Keywords</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" placeholder="输入SEO关键字" name="website.Keywords" value="<?php echo $settingInfo['website.Keywords']; ?>">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label">标语 <span class="tpl-form-line-small-title">Slogan</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" placeholder="输入slogan" name="website.Slogan" value="<?php echo $settingInfo['website.Slogan']; ?>">
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">LOGO</label>
                                    <div class="am-u-sm-9">
                                        
                                        <input type="text" id="website.LOGO" name="website.LOGO" value="<?php echo $settingInfo['website.LOGO']; ?>">
                                        <br>
                                        <div class="am-form-group am-form-file">

                                            <div class="tpl-form-file-img" id="doPreview" if $article_info neq true}style="display: none;"{/if}>
                                                <img src="<?php echo $settingInfo['website.LOGO']; ?>" alt="">
                                            </div>

                                            <button type="button" id="uploadBtn" class="am-btn <?php if($settingInfo['website.LOGO']): ?>am-btn-primary<?php else: ?>am-btn-default<?php endif; ?> am-btn-sm">
                                                <i class="am-icon-cloud-upload"></i> <?php if($settingInfo['website.LOGO']): ?>重新选择LOGO<?php else: ?>选择要上传的LOGO<?php endif; ?>
                                            </button>
                                            <input type="file" name="images" multiple="multipart/form-data" onchange="showPreview(this)">
                                        </div>                                        
                                    </div>
                                </div>

                                <!-- <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">作者 <span class="tpl-form-line-small-title">Author</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}">
                                          <option value="a">-The.CC</option>
                                          <option value="b">夕风色</option>
                                          <option value="o">Orange</option>
                                        </select>
                                    </div>
                                </div>                   
                                                                
                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">隐藏文章</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" checked />
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="button" id="saveBtn" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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

<script type="text/javascript">

var API_URL = '/admin.php';

$("#saveBtn").on('click', function(){
    var data = $("#settingForm").serialize();
// console.log(data);return;
    $.ajax({
        url:API_URL+'/setting/save',
        type:'POST',
        data:data,
        dataType:'json',
        success:function(res) {
            if (res.code == 200) {
                // window.location.href = API_URL+'/setting';                
                alert('设置已保存')
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
    formData.append("type", 'logo');

    // if(uploading){
    //     alert("头像正在上传中，请稍候");
    //     return false;
    // }

    // if (!verifyPicFile(obj)) {
    //     // do something
    // }

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
                $("#website.LOGO").val(res.data.img_url);

                // 按钮样式
                $("#uploadBtn").removeClass("am-btn-default").addClass("am-btn-primary");
            } else {
                showError(res.data.msg);
                // 按钮样式
                $("#uploadBtn").removeClass("am-btn-default").addClass("am-btn-danger");                
            }

            $("#uploadBtn").html('<i class="am-icon-cloud-upload"></i> 重新选择LOGO');         
        }
    });
}

// //图片尺寸验证
// function verifyPicFile(file) {
//     var filePath = file.value;
//     if(filePath){
//         //读取图片数据
//         var filePic = file.files[0];
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             var data = e.target.result;
//             //加载图片获取图片真实宽度和高度
//             var image = new Image();
//             image.onload=function(){
//                 var width = image.width;
//                 var height = image.height;
//                 if (width/height == 16/9){
//                     //  do nothing
//                 }else {
//                     alert("图片宽高比例应为：16:9，建议上传1920*1280尺寸的图片");
//                     file.value = "";
//                     return false;
//                 }
//             };
//             image.src= data;
//         };
//         reader.readAsDataURL(filePic);
//     }else{
//         return false;
//     }
// }

</script>


<script src="/static/blog/admin1/js/app.js"></script>

</html>