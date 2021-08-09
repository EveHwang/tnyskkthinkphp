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
	
	

<!-- 引入这个页面特有的CSS和JS -->
<link rel="stylesheet" href="/Public/Home/style/index.css" type="text/css">
<script type="text/javascript" src="/Public/Home/js/index1.js"></script>
<script type="text/javascript" src="/Public/Home/js/index.js"></script>
<script src="/Public/Home/js/jquery-1.4.1.min.js" type="text/javascript"></script>
<link href="/Public/Home/style/index-mini-new.css" type="text/css" rel="stylesheet" />
<link href="/Public/Home/style/index1.css" type="text/css" rel="stylesheet" />

<style>
.move_div_top {
	display: none;
	right: 85px;
	overflow: hidden;
	width: 32px;
	color: white;
	bottom:-1790px;
	position: absolute;
	height:50px
}
.move_div_top span {
	display: block; text-align: center
}
.move_div_top span a {
	color: #d22b61; text-decoration: none
}
.move_div_top span a:hover {
	color: #d22b61; text-decoration: none
}
</style>
</head>

<body>
<!--head begin-->
<div class="head">
    <div class="left"><a href="<?php echo U('Admin/index/index'); ?>"><img src="/Public/Home/images/logo.jpg"/></a></div>
</div><strong></strong>
<div class="dd">
    <li><a style="color:#000" href="<?php echo U('Member/login'); ?>">登录</a>
   <a style="color:#000" href="<?php echo U('Member/regist'); ?>">|注册</a></li>
</div>
	 <span id="box">搜索</span>
  <input class="box"  />
<!--head end-->
<!--nav begin-->
<div id="nav">
    <ul style="background: #83aab9"; class="nav">
   	   <li><a href="<?php echo U('Index/index'); ?>" class="color_in">首页</a></li>
        <li><a href="<?php echo U('Index/Periodical'); ?>">期刊</a></li>
        <li><a href="<?php echo U('Index/Book'); ?>">图书</a></li>
        <li><a href="<?php echo U('Index/About'); ?>">关于我们</a></li>
        <li><a href="<?php echo U('Index/Personal center'); ?>">个人中心</a></li>
    </ul>
</div>
<!--nav end-->
<!--banner begin-->
<div class="banner">
    <ul class="banner_pic" id="banner_pic">
        <li class="current"><img class="one" src="/Public/Home/images/1.jpg" width="1300" height="530"/></li>
        <li class="pic"><img class="one" src="/Public/Home/images/2.jpg" width="1300" height="530"/></li>
	    <li class="pic"><img class="one" src="/Public/Home/images/7.jpg" width="1300" height="530"/></li>
        <li class="pic"><img class="one" src="/Public/Home/images/5.jpg" width="1300" height="530"/></li>
	 </ul>
	  <ol id="button"
         <li class="current"></li>
 	     <li class="but"></li>
	     <li class="but"></li>
         <li class="but"></li>
	  </ol>

</div>
<!--banner end-->
<div class="col">
	<!--热门推荐-->
<div class="title">
    <i class="book"></i>
    <span style="font-size:25px; magin-bottom:20px;">热门推荐</span>
</div><br />
<div class="span">
   <a style="color:#000" href="#"<span class="click">计算机&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a> 
    <a style="color:#000" href="#"><span class="">电子&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">科普&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">通信&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">摄影&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">经济&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">管理&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">金融与投资&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">励志&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">心理学&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">设计&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">音乐&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">电影&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">美妆&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">生活&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">工业&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span></a>
    <a style="color:#000" href="#"><span class="">绘画&nbsp;&nbsp;&nbsp;</span></a>
</div>
<div class="nice">
	<a href="#"><img class="cb" src="/Public/Home/images/59.jpg" width="200" height="300"/></a>
    <a href="#"><img class="cb" src="/Public/Home/images/60.jpg" width="200" height="300"/></a>
    <img class="cb" src="/Public/Home/images/61.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/62.jpg" width="200" height="300"/>
    <br /><br />
    <img class="cb" src="/Public/Home/images/63.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/64.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/65.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/66.jpg" width="200" height="300"/>
</div>
</div>

<div class="col">
	<!--精品书籍-->
    <div class="title2">
    <i class="book2"></i>
    <span style="font-size:25px;">精品书籍</span>
</div>
<br /><br />
<div class="nice">
	<img class="cb" src="/Public/Home/images/9.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/10.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/11.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/12.jpg" width="200" height="300"/>
    <br /><br />
    <img class="cb" src="/Public/Home/images/13.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/14.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/15.jpg" width="200" height="300"/>
    <img class="cb" src="/Public/Home/images/16.jpg" width="200" height="300"/>
</div>
</div>
    <br /><br />
    <div class="move_div_top" id="sun_move_div_top"><span><a href="javascript:scroll(0,0)"><img src="/Public/Home/images/top.png" align="返回顶部" /></a></span> </div>
<script language="javascript">
//移动小窗口
$(function(){
  var obj=$("#sun_move_div_top");
  if(obj) {
	var move_div_obj = $('#sun_move_div_top');
	var move_div_show = 0;
	var move_div_height = parseInt(move_div_obj.css('height'));
	var move_div_bottom = parseInt(move_div_obj.css('bottom'));
	$(window).scroll(
	  function() {
	  var _clientHeight = document.documentElement.clientHeight;
	  var _scrollTop = document.documentElement.scrollTop-100+document.body.scrollTop;
	  if (move_div_show == 0 && _scrollTop > 50) {
		move_div_obj.fadeIn(200);
		move_div_show = 1; }
	  else if (move_div_show == 1 && _scrollTop < 50) {
		move_div_obj.fadeOut(500);
		move_div_show = 0; }
	  if (_scrollTop > 100 && $.browser.msie && $.browser.version.indexOf('6.0') > -1){
		move_div_obj.css('bottom', '');
		move_div_obj.css('top', 
			 (_scrollTop + _clientHeight - move_div_height - move_div_bottom) + 'px'); }
	})	
  }
})	
</script>
	    
<!--footer-->
<div class="foot">
<div class="list">
 <dl>
   <dt>关于我们</dt>
   <dd>社长寄语</dd>
   <dd>企业简介</dd>
   <dd>组织机构</dd>
   <dd>部门介绍</dd>
 </dl>
 <dl>
   <dt>联系我们</dt>
   <dd>读者服务</dd>
   <dd>营销渠道服务</dd>
   <dd>投稿咨询</dd>
   <dd>教材服务</dd>
   <dd>图书馆服务</dd>
   <dd>经销商园地</dd>
 </dl>
 <dl>
   <dt>联系我们</dt>
   <dd>读者服务</dd>
   <dd>营销渠道服务</dd>
   <dd>投稿咨询</dd>
   <dd>教材服务</dd>
   <dd>图书馆服务</dd>
   <dd>经销商园地</dd>
 </dl>
 <dl>
   <dt>联系我们</dt>
   <dd>读者服务</dd>
   <dd>营销渠道服务</dd>
   <dd>投稿咨询</dd>
   <dd>教材服务</dd>
   <dd>图书馆服务</dd>
   <dd>经销商园地</dd>
 </dl>
  <dl style="margin-left: 50px; margin-right: -220px;">
    <dt style="margin-right: -70px;"><img src="/Public/Home/images/32.jpg"  width="100" height="90"></dt>
    <dt style="margin-right: -60px;margin-bottom: -10px;">关注微信</dt>
    <dd style="margin-right: -60px;">获取专属服务特权</dd>
  </dl>
  <dl style="margin-left: 250px;">
    <dt><img src="/Public/Home/images/32.jpg"  width="100" height="90"></dt>
    <dt style="margin-bottom: -10px;">关注微店</dt>
    <dd>立即领取30元优惠券</dd>
  </dl>
</div>
</div>
</body>
</html>



	
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