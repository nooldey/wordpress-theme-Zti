<?php
/**
 * Template Name: demo
 */
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'demo.php' == basename($_SERVER['SCRIPT_FILENAME'])){
		die ('Please do not load this page directly!');
	}
	if ($_GET['id'] != ''){
		$id = $_GET['id'];
		$url = get_post_meta($id, 'demo_value', true);
	}else{
		die ('Please do not load this page directly!');
	}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo('name') ?>">
<meta http-equiv="Cache-Control" content="no-siteapp">
<title><?php echo get_post($id)->post_title; ?> DEMO</title>
<meta name="keywords" content="演示页面,主题演示,<?php echo get_bloginfo('name') ?>">
<meta name="description" content="<?php echo get_bloginfo('description') ?>">
<style>body{margin:0;padding:0;overflow: hidden;}header{position:fixed; font-size: 13px; top:0; left:0; width:100%; height:30px; background-color: #353535; color:#F1F1F1; } header p{margin:0 5em; height:30px; line-height: 30px; } header a{color:#F1F1F1; text-decoration: none; padding-right:5px;border-right:1px solid #F1F1F1; } header a:hover{text-decoration: underline; color: #16AFC1; } #preview-frame{margin-top:30px;height:100%;width:100%;}</style>
<script src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
	var frameHeight = function() {
        var headerBar = $('#header').height();
        $('#preview-frame').height($(window).height() - headerBar);
      }
      $(window).resize(function() {
        frameHeight();
      }).load(function() {
        frameHeight();
      });
</script>
</head>
<body>
	<header id="header">
		<p>
			<a href="<?php echo get_permalink($id);?>" class="back">主题介绍</a>
			<a href="<?php echo get_bloginfo('home') ?>" class="back">回到主站</a>
			<span>提示：所有主题的演示系调用其它网站内容而来，因实际站点的更新或修改，显示效果与主题介绍可能不一致，具体样式请以正文及图片为准！</span>
		</p>
	</header>
	<iframe id="preview-frame" src="<?php echo $url;?>" name="preview-frame" frameborder="0" noresize="noresize" marginheight="0" marginwidth="0"></iframe>
</body>
</html>
