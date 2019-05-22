<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/mnt/d/Workspace/www/tp5-chat/public/../application/admin/view/login/login.html";i:1558419514;s:64:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout.html";i:1558406246;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/header.html";i:1558419499;s:71:"/mnt/d/Workspace/www/tp5-chat/application/admin/view/layout/footer.html";i:1558406246;}*/ ?>
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

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				52xue后台<span> 登录</span> <i class="am-icon-skyatlas"></i>				
			</div>
		</div>

		<div class="login-font">
			<i>Log In </i> or <span> Sign Up</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form">
				<fieldset>
					<div class="am-form-group">
						<input type="email" class="" id="doc-ipt-email-1" name="email" placeholder="输入电子邮件">
					</div>
					<div class="am-form-group">
						<input type="password" class="" id="doc-ipt-pwd-1" name="Password" placeholder="输入密码">
					</div>
					<p><button type="button" class="am-btn am-btn-default" id="btnLog">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
  
  $("#btnLog").on('click', function(){
    var formData = $(".am-form").serialize();
    
    $.ajax({
        type:'POST',
        url:'/login/login',
        data:formData,
        dataType:'json',
        success:function(res){
            if (res.code == '200') {
                window.location.href = '/';
            }else{
                alert(res.msg)
            }
        }
    })
})

</script>



<script src="/static/blog/admin1/js/app.js"></script>

</html>