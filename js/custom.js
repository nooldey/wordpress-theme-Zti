/*滚动到顶部*/
jQuery(document).ready(function() {
    jQuery('#gototop').click(function(){jQuery('html,body').animate({scrollTop:'0px'},800);});
    });
/*公告*/
function AutoScroll(obj){
	jQuery(obj).find("ul:first").animate({marginTop:"-20px"},500,function(){
		$(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
	});
}
jQuery(document).ready(function(){
	var myar=setInterval('AutoScroll(".tips")',3500)
	jQuery(".tips").hover(function(){
		clearInterval(myar);
		},function(){
		myar=setInterval('AutoScroll(".tips")',3500)
	});
});
