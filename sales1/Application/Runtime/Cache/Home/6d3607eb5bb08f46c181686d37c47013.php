<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们</title>
<link href="/Public/Home/style/style3.css" type="text/css" rel="stylesheet" />
<script src="/Public/Home/js/jquery.js" type="text/javascript"></script>
<script src="https://api.map.baidu.com/api?v=2.0&ak=1a3c89ddb9bcfaf5b9dc4b62e3f2a05b"></script>
</head>

<body>
<!--head begin-->
<div class="head">
    <div class="left"><img src="/Public/Home/images/logo.jpg"/></div>
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
    <ul class="nav">
       <li><a href="<?php echo U('Index/index'); ?>" >首页</a></li>
        <li><a href="<?php echo U('Index/Periodical'); ?>">期刊</a></li>
        <li><a href="<?php echo U('Index/Book'); ?>">图书</a></li>
        <li><a href="<?php echo U('Index/About'); ?>" class="color_in">关于我们</a></li>
        <li><a href="<?php echo U('Index/Personal center'); ?>">个人中心</a></li>
    </ul>
</div>
<!--nav end-->
<!--nav end-->
<div class="time">
<script language="javascript" type="text/javascript">
var today, hour;
today = new Date();
hour = today.getHours();
if(hour < 8){document.write("&nbsp;早上好!");}
  else if(hour < 12){document.write("&nbsp;上午好!");}
    else if(hour < 14){document.write("&nbsp;中午好!");}
	   else if(hour < 17){document.write("&nbsp;下午好!");}
	       else          {document.write("&nbsp;晚上好!");}
</script>
</div>	
	<br/>

<div class="pic">
	<img src="/Public/Home/images/55.jpg"  width="180" height="100" class="pic2"/>
    <img src="/Public/Home/images/56.jpg"  width="180" height="100" class="pic2"/>
    <img src="/Public/Home/images/57.jpg"  width="180" height="100" class="pic2"/>
    <img src="/Public/Home/images/58.jpg"  width="180" height="100" class="pic2"/>
</div>
	
<div class="col">
	<div class="title">
    <i class="book"></i>
    <p class="this">图书馆简介</p>
</div>
<p class="font" style="line-height:30px;">图你有书可看图书馆成立于2020年11月17日，是一个以图书销售为主的购物型网站，由涵盖科技出版、教育出版、大众出版，涉及信息技术、通信、工业技术、科普、经济管理、摄影、艺术、运动与休闲、心理学、少儿、大中专教材等十余个类型图书。建馆以来始终坚持正版书籍销售，坚持为科技发展与社会进步服务、为繁荣社会主义文化服务，坚持积极进取、改革创新，围绕“立足信息产业，面向现代社会，传播科学知识，服务科教兴国，为走中国特色新型工业化道路服务”的销售宗旨，已发展成为集图书、期刊于一体的综合性图书馆。</p>
<p class="font" style="line-height:30px;">本馆有售人民邮电出版社出版的19种期刊，包括《通信学报》《电信科学》《大数据》《网络与信息安全学报》《物联网学报》等学术期刊，《无线电》《集邮》《摩托车》等科普、兴趣类期刊，《米老鼠》《童趣》等少儿类期刊，在相关领域均具有较强影响力。其中，《通信学报》《电信科学》为中文核心期刊，《通信学报》被美国工程索引（EI）等收录。</p>
<p class="font" style="line-height:30px;">图你有书可看图书馆秉承“尊重、诚信、严谨、高效、创新”的企业精神、“员工与出版社共同成长”的企业文化，一批批优秀人才不断加入到邮电出版事业的发展中。全馆现有员工10余人，一支素质高、能力强、业务精、善创新的干部员工队伍已经形成，成为支撑持续健康发展的基石。</p>
</div>
	
	<br/><br/><br/>
<div class="container">
  <div style="text-align:center">
    <h2 style="font-family:'Times New Roman', Times, serif">Contact us</h2>
    </br></br>
    <p align="left">请填写信息:</p>
  </div>
  <div class="row">
    <div class="column">
      <div id="allmap" style="width:100%;height:500px"></div>
    </div>
    <div class="column">
      <form action="/Public/Home/images/115.jpg">
        <label for="name">姓名</label>
        <input type="text" id="fname" name="name" placeholder="请输入您的真实姓名...">
        <label for="phone">联系电话</label>
        <input type="text" id="phone" name="phone" placeholder="请输入您的联系电话...">
        <label for="country">位置</label>
        <select id="country" name="country">
          <option value="bj">茂名</option>
          <option value="bj">北京</option>
          <option value="sh">上海</option>
          <option value="sz">深圳</option>
          <option value="bj">重庆</option>
          <option value="bj">江苏</option>
          <option value="bj">海南</option>
          <option value="bj">内蒙古</option>
          <option value="bj">哈尔滨</option>
        </select>
        <label for="subject">留言</label>
        <textarea id="subject" name="subject" placeholder="请输入留言..." style="height:150px"></textarea>
        <input type="submit" value="提交">
      </form>
    </div>
  </div>
</div>
</div>

</div>
<script type="text/javascript" language="javascript">
 var map = new BMap.Map("allmap"); 
  map.centerAndZoom(new BMap.Point(110.931, 21.668), 11);
  //添加地图类型控件
  map.addControl(new BMap.MapTypeControl({
    mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));   
  map.setCurrentCity("茂名");     
  map.enableScrollWheelZoom(true);
</script>

<div class="list_feedback_panel">
 <p>
  <span class="icon"></span>
  <span class="tip">对我们有何意见或建议？</span>
  <a href="javacript:void(0)" id="list_feedback_show" style="display:inline" onclick="hideShow();return false;">我要说两句</a>
  <span class="hidden" id="list_feedback_hit">谢谢您的反馈!</span>
 </p>
 <div class="feedback_form hidden" id="list_feedback_content_div">
  <textarea class="default" id="list_feedback_content">请留下您的意见或建议</textarea>
  <div class="btn_panel">
   <a href="javacript:void(0)" id="list_feedback_submit" style="text-decoration:none" name="cancel_s" onclick="submitSuggestion();return false;">
     <span>提&nbsp;&nbsp;交</span>
   </a>
   <a href="javacript:void(0)" id="list_feedback_cancel" name="canael_s" onclick="cancelSuggestion();return false;">
     <span>取&nbsp;&nbsp;消</span>  
   </a>
  </div>
 </div>
</div>

<script type="text/javascript">
function hideShow(){
	$("#list_feedback_show").hide();
	$("#list_feedback_content_div").show();
	}
function submitSuggestion(){
	$("#list_feedback_hit").show();
	var content = $("#list_feedback_content").val();
	if($.trim(content)=='请留下您的意见或建议')
	    content = '';
		var send_url = document.location.toString();
		var research_type = 670;
		if(content!=''){
			$.post("../hosts/callback.php",
			{
				"type":"research",
				"send_url":send_url,
				"content":content,
				"research_type":research_type,
				"t":Math.random()
			},
			function(data){
				if(data!=="0"){
                     $("#list_feedback_content_div").hide();
					 $("#list_feedback_show").hide();
					 $("#list_feedback_hit").removeClass("hidden");
				}else{
					alert("网络链接问题,请稍后提交");
					}
				});
			}
	}
function cancelSuggestion(){
	$("#list_feedback_content_div").hide();
	$("#list_feedback_show").show();
	$("#list_feedback_content").val('请留下您的意见或建议');
	$("#list_feedback_content").addClass("default");
	$("#list_feedback_hit").hide();
	$("#list_feedback_hit").addClass("hidden");
	}
$(function(){
	$("#list_feedback_content").focus(function(){
		var obj = $(this);
		obj.removeClass("default");
		if($.trim(obj.val())=='请留下您的意见或建议')
		   obj.val('');
		}).bind("blur",function(){
			var obj = $(this);
			if($.trim(obj.val()).length == 0){
				obj.addClass("default");
				obj.val('请留下您的意见或建议');
				}
		});
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