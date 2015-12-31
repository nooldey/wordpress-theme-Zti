<!DOCTYPE html>
<html itemscope="itemscope" itemtype="http://schema.org/WebPage" lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-title" content="<?php echo get_bloginfo('name') ?>">
<meta http-equiv="Cache-Control" content="no-siteapp">
<?php zti_wp_meta();?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><!--以下开始自定义-->
	<header class="index-header">
		<?php require_once get_stylesheet_directory() .'/lib/topbar.php'; ?>
		<div class="container header-logo">
			<?php zti_mylogo();?>
		</div>
		<div class="navbar navbar-default navbar-static-top" role="banner">
			<div class="container">
			    <div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".header-navbar-collapse">
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        </button>
			    </div><!--headlogo-->
			    <nav id="navbar" class="collapse navbar-collapse header-navbar-collapse" role="navigation">
			        <?php
			          wp_nav_menu( array(
			            'menu'              => 'primary',
			            'theme_location'    => 'primary',
			            'depth'             => 2,
			            'container'         => '',
			            'container_class'   => '',
			            'menu_class'        => 'nav navbar-nav',
			            'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
			            'walker'            => new zti_bootstrap_navwalker()
			          ));?>			      
				</nav>
		 	</div>
		</div><!--navbar-->
	</header>