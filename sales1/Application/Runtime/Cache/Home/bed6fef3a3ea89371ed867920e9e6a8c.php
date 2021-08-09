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
<link href="/Public/Home/style/style7.css" rel="stylesheet" type="text/css" />
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="京西商城"></a></h2>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>
			<?php if(isset($_SESSION['openid'])): ?>
				如果您还没有账号请先注册一个账号然后完成QQ的绑定
			<?php else: ?>
				用户注册
			<?php endif; ?>
			</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="/index.php/Home/Member/regist.html" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" />
							<p>1-30位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" />
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="cpassword" />
							<p> <span>请再次输入密码</p>
						</li>
						<li class="checkcode">
							<label for="">验证码：</label>
							<input type="text"  name="chkcode" />
							<img style="cursor:pointer;" onclick="this.src='<?php echo U('chkcode'); ?>#'+Math.random();" src="<?php echo U('chkcode'); ?>" />
							<span>看不清？<a href="">换一张</a></span>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" name="must_click" value="1" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>

				
			</div>
			
			<div class="mobile fl">
				<h3>手机快速注册</h3>			
				<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
				<p><strong>1069099988</strong></p>
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