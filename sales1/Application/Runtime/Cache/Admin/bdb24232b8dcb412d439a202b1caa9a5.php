<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#header-div {
  background:#83aab9;
  border-bottom:1px solid #FFF;
}

#logo-div {
  height:50px;
  float:left;
}

#submenu-div {
  height:50px;
}

#submenu-div ul {
  margin:3px 20px 0 0;
  padding:0;
  float:right;
  list-style-type:none;
}

#submenu-div li {
  float:left;
  padding:0 10px;
  margin:3px 0;
  border-right:1px solid #FFF;
}

#submenu-div a:visited, #submenu-div a:link {
  color:#FFF;
  text-decoration:none;
}

#submenu-div a:hover {
  color:#F5C29A;
}

#loading-div {
  clear:right;
  text-align:right;
  display:block;
}

#menu-div {
  background:#83aab9;
  font-weight:bold;
  height:24px;
  line-height:24px;
}

#menu-div ul {
  margin:0;
  padding:0;
  list-style-type:none;
}

#menu-div li {
  float:left;
  border-right:1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding:0 20px;
  text-decoration:none;
  color:#335B64;
  background:#83aab9;
}

#menu-div a:hover {
  color:#000;
  background:#80BDCB;
}

#submenu-div a.fix-submenu{
    clear:both;
    margin-left:5px;
    padding:1px 5px;
    background:#DDEEF2;
    color:#278296;
}

#submenu-div a.fix-submenu:hover{
    padding:1px 5px;
    background:#FFF;
    color:#278296;
}

#menu-div li.fix-spacel{
    width:30px;
    border-left:none;
}

#menu-div li.fix-spacer{
    border-right:none;
}
#send_info {
  padding:5px 30px 0 0;
  clear:right;
  text-align:right;
  color:#FF9900;
  width:40%;
  float:right;  
}
</style>

</head>
<body>
<div id="header-div">
    <div id="logo-div" style="bgcolor:#000000; color: #fff; font-size: 30px; font-family: '方正舒体';">
        <!-- <img src="/Public/Admin/Images/topic.jpg" alt="ECSHOP - power for e-commerce" /> -->
        图你有书可看
    </div>
    <div id="submenu-div">
        <ul>
            <li><a href="<?php echo U('Home/index/index'); ?>" target="_blank">返回前台</a></li>
            <li><a href="#" target="main-frame">个人设置</a></li>
            <li style="border-right:none"><a href="#">刷新</a></li>
        </ul>
        <div id="send_info">
        	您好，<?php echo session('username'); ?>
            <a href="#" target="main-frame" class="fix-submenu">清除缓存</a>
            <a href="<?php echo U('Login/logout'); ?>" target="_top" class="fix-submenu">退出</a>
        </div>
    </div>
</div>
<div id="menu-div">
    <ul>
        <li class="fix-spacel">&nbsp;</li>
        <li><a href="__GROUP__/Index/main" target="main-frame">起始页</a></li>
        <li><a href="__GROUP__/Goods/goodsList" target="main-frame">商品列表</a></li>
        <li><a href="__GROUP__/Comment/commentList" target="main-frame">分类列表</a></li>
        <li><a href="__GROUP__/User/userList" target="main-frame">会员列表</a></li>
        <li class="fix-spacer">&nbsp;</li>
    </ul>
    <br class="clear" />
</div>
</body>
</html>