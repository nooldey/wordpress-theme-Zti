<?php
/**
 * Index Template of ZTIIII WordPress Theme
 * for CMS index
 * @author 主题站（ztiiii）
 * @link http://ztiiii.com/
**/
?>
<?php if (zti_opt('zti_slide_sw') == '1') {
    	require_once get_stylesheet_directory() .'/lib/slider.php';
    } ?>
<main id="main" class="container">
	<?php require_once get_stylesheet_directory() .'/lib/fantasy.php';?>
	<?php require_once get_stylesheet_directory() .'/lib/thumbpost.php';?>
			<!--CMS-->
	<?php require_once get_stylesheet_directory() .'/lib/poststab.php';?>
	<?php require_once get_stylesheet_directory() .'/lib/cms.php';?>
			<!--CMS end-->
</main>

