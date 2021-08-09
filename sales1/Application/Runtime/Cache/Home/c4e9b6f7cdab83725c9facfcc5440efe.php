<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo $_page_title; ?></title>
	<meta name="keywords" content="<?php echo $_page_keywords; ?>" />
	<meta name="description" content="<?php echo $_page_description; ?>" />
	<!-- 引入公共的CSS -->
	<link rel="stylesheet" href="/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/header.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/footer.css" type="text/css">
	<!-- 引入公共的JS -->
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
</head>
<body>
	
	<div style="clear:both;"></div>
	
	
<link rel="stylesheet" href="/Public/Home/style/login.css" type="text/css">
<link href="/Public/Home/style/style6.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/style/style3.css" type="text/css" rel="stylesheet" />

	
	<div class="head">
    <div class="left"><img src="/Public/Home/images/topic.jpg" /></div>
</div>
<!--nav begin-->
<div id="nav">
    <ul class="nav">
       <li><a href="<?php echo U('Index/index'); ?>" >首页</a></li>
        <li><a href="<?php echo U('Index/Periodical'); ?>">期刊</a></li>
        <li><a href="<?php echo U('Index/Book'); ?>">图书</a></li>
        <li><a href="<?php echo U('Index/About'); ?>">关于我们</a></li>
        <li><a href="<?php echo U('Index/Personal center'); ?>">个人中心</a></li>
    </ul>
</div>
<!--nav end-->
		<div style="float: right; margin-right: 500px; margin-top: 50px; padding: 60px 0 30px 30px; border: 1px solid #D1D1D1;" class="login_bc">
			<div class="login_form fl">
				<form action="/index.php/Home/Member/login.html" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input style="margin-left: -88px;" type="text" class="txt" name="username" />
						</li>
						<li>
							<label for="">密码：</label>
							<input style="margin-left: -20px;"   type="password" class="txt" name="password" />
							<a href="">忘记密码?</a>
						</li>
						<li class="checkcode">
							<label for="">验证码：</label>
							<input style="margin-left: -55px;" type="text"  name="chkcode" placeholder="请输入验证码" />
							<img style="cursor:pointer; width:20%; float:right; margin-right:120px; onclick="this.src='<?php echo U('chkcode'); ?>#'+Math.random();" src="<?php echo U('chkcode'); ?>" />
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input style="margin-left: -140px;" type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>

				<img style="margin-left:-20px; margin-top:20px; margin-bottom:20px; width:50%" src="/Public/Home/images/title.jpg"   />
    <br />
    <img src="/Public/Home/images/vx.png" />
    <img src="/Public/Home/images/qq.png" />

			</div>
			
		
		</div>
	</div>
	<!-- 登录主体部分end -->

	
	<div style="clear:both;"></div>


</body>
</html>

<script>
// 判断登录状态 
$.ajax({
	type : "GET",
	url : "<?php echo U('Member/ajaxChkLogin'); ?>",
	dataType : "json",
	success : function(data)
	{
		if(data.login == 1)
			var li = '您好，'+data.username+' [<a href="<?php echo U('Member/logout'); ?>">退出</a>]';
		else
			var li = '您好，欢迎来到图你有书可看[<a href="<?php echo U('Member/login'); ?>">登录</a>] [<a href="<?php echo U('Member/regist'); ?>">免费注册</a>]'
		$("#logInfo").html(li);
	}
});
</script>