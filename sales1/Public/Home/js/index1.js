// JavaScript Document
window.onload=function(){
 	//顶部的焦点图切换
 	function hotChange(){
 		var current_index=0;
 		var timer=window.setInterval(autoChange, 3000);
 		var button_li=document.getElementById("button").getElementsByTagName("li");
 		var pic_li=document.getElementById("banner_pic").getElementsByTagName("li");
 		for(var i=0;i<button_li.length;i++){
 				button_li[i].onmouseover=function(){
 					if(timer){
 						clearInterval(timer);
 				}
for(var j=0;j<pic_li.length;j++){
 						if(button_li[j]==this){
 							current_index=j;
						button_li[j].className="current";
							pic_li[j].className="current";
					}else{
						pic_li[j].className="pic";
						button_li[j].className="but";
						}
					}
				}
			button_li[i].onmouseout=function(){
					timer=setInterval(autoChange,3000);			
				}
		}
 			function autoChange(){
				++current_index;
			if (current_index==button_li.length) {
					current_index=0;
 }
			for(var i=0;i<button_li.length;i++){
 				if(i==current_index){
						button_li[i].className="current";
						pic_li[i].className="current";
 				}else{
					button_li[i].className="but";
						pic_li[i].className="pic";
					}
				}
		  }
		}
		hotChange();
	}
	function school(){
		var speed = 50;                                          //定义滚动速度
		var imgbox = document.getElementById("imgbox");
	imgbox.innerHTML += imgbox.innerHTML;               //复制一个<span>，用于无缝滚动
	var span = imgbox.getElementsByTagName("span");   //获取两个<span>元素
		var timer1 = window.setInterval(marquee,speed);   //启动定时器，调用滚动函数
	imgbox.onmouseover = function(){
			clearInterval(timer1);
 		}
 		imgbox.onmouseout = function(){
 		timer1=setInterval(marquee,speed);
 		};
		function marquee(){
			if(imgbox.scrollLeft > span[0].offsetWidth){    //当第1个<span>被完全卷出时
 			imgbox.scrollLeft = 0;                          //将被卷起的内容归0
			}else{
			++imgbox.scrollLeft;                           //否则向左滚动
			}
		}
	}
	school();
function tableChange(){
	var lis = document.getElementById("SwitchNav").getElementsByTagName("li");
		var spans=document.getElementById("SwitchBigPic").getElementsByTagName("span");
		var current_index=0;                    //保存当前焦点元素的索引
		var timer = setInterval(autoChange,3000);
		for(var i=0;i<lis.length;i++){         //遍历lis，为各<li>元素添加事件
			lis[i].onmouseover = function(){
				if(timer){                       //定时器存在时清除定时器
				clearInterval(timer);
				}
 				for(var i=0;i<lis.length;i++){
					if(lis[i]==this){
						spans[i].className = "sp";					
						current_index = i;
					}else{
						spans[i].className = "";	
					}
					}
		}
			lis[i].onmouseout = function(){
				timer = setInterval(autoChange,3000);   //启动定时器，恢复图片自动切换
			}
		}
 		function autoChange(){
			++current_index;
			if (current_index == lis.length) {            //当索引自增达到上限时，索引归0
				current_index=0;
			}
			for (var i=0; i<lis.length; i++) {
				spans[i].className = "";	
			}
			spans[current_index].className = "sp";
 		}
 	}
	tableChange();




