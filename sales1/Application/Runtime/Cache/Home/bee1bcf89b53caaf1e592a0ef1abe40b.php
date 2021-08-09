<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<link href="/Public/Home/style/style5.css" rel="stylesheet" type="text/css" />
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
       <li><a href="<?php echo U('Index/index'); ?>" class="color_in">首页</a></li>
        <li><a href="<?php echo U('Index/Periodical'); ?>">期刊</a></li>
        <li><a href="<?php echo U('Index/Book'); ?>">图书</a></li>
        <li><a href="<?php echo U('Index/About'); ?>">关于我们</a></li>
        <li><a href="<?php echo U('Index/Personal center'); ?>">个人中心</a></li>
    </ul>
</div>
<!--nav end-->

<div id="center">
   <div class="box">
        <div class="per_box" >
             <img src="/Public/Home/images/portrait_def.png" />
               <div class="w80">
                   <p>请完善昵称</p>
                   <p class="li_24 font_14" >请完善自我介绍！</p>
               </div>
        </div>
   </div>
</div>

<div class="warp com_shadow">
<div class="row per_record">
    <div class="col-md-3 col-sm-2">
          <span class="br_r">
                <a href="#">我的订单</a>
          </span>
    </div>
     <div class="col-md-3 col-sm-2">
            <span class="br_r">
                  <a href="#">
                      待付款(
                      <i>0</i>
                      )
                  </a>
            </span>
     </div>
     <div class="col-md-3 col-sm-2">
            <span class="br_r">
                  <a href="#">
                      已付款(
                      <i>0</i>
                      )
                  </a>
            </span>
     </div>
     <div class="col-md-3 col-sm-2">
            <span>
                  <a href="#">
                      退款/退货(
                      <i>0</i>
                      )
                  </a>
            </span>
            </div>
  </div>      
</div>
<br />

  <div class="warp_b warp_center">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                 <div class="per_center text-left">
                      <span>个人中心</span>
                       <div class="row">
                           <div class="col-md-2 col-sm-3">
                              <p>
                                 <a href="#">
                                   <img src="/Public/Home/images/xinxi.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                 </a>
                              </p>
                              <p>
                                  <a href="#">我的信息</a>
                              </p>
                           </div>
                           <div class="col-md-2 col-sm-3">
                              <p>
                                 <a href="#">
                                    <img src="/Public/Home/images/password.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                 </a>
                              </p>
                              <p>
                                 <a href="#">修改密码</a>
                              </p>
                           </div>
                           <div class="col-md-2 col-sm-3">
                               <p>
                                   <a href="#">
                                      <img src="/Public/Home/images/dizhi.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                   </a>
                               </p>
                               <p>
                                  <a href="#">收货地址</a>
                               </p>
                           </div>
                           <div class="col-md-2 col-sm-3">
                              <p>
                                  <a href="#">
                                      <img src="/Public/Home/images/xiaoxi.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                  </a>
                              </p>
                              <p>
                                  <a href="#">消息中心</a>
                              </p>
                           </div>
                           <div class="col-md-2 col-sm-3">
                                <p>
                                   <a href="#">
                                      <img src="/Public/Home/images/shoucang.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                   </a>
                                </p>
                                <p>
                                   <a href="#">商品收藏</a>
                                </p>
                           </div>
                           <div class="col-md-2 col-sm-3">
                                <p>
                                   <a href="#">
                                      <img src="/Public/Home/images/history.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                   </a>
                                </p>
                                <p>
                                   <a href="#">浏览历史</a>
                                </p>
                           </div>
                       </div>
                 </div>
            </div>
        </div>
  </div>

    <div class="warp_a warp_center">
         <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="per_center text-left">
                        <span>书单中心</span>
                        <div class="row">
                               <div class="col-md-2 col-sm-3">
                                   <a href="#">
                                       <p>
                                          <img src="/Public/Home/images/book.png" width="30" height="30" class="iconfont_center" style="width:30px; height:30px;" />
                                       </p>
                                       <p>推荐书单</p>
                                   </a> 
                               </div>
                        </div>
                  </div>
              </div>
         </div>
    </div>   
</div>  

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