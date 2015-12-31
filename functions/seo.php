<?php
function zti_wp_meta() {
	global $post;
	$description = '';
	$keywords = '';
	$name = get_bloginfo('name');
	$desc = get_bloginfo('description');
	$cnc =  "\r".zti_opt('zti_cnc')."\r";
	if (is_home()) {
		$title = $name.$cnc.$desc;
		$keywords = zti_opt('zti_keyword');
		$description = zti_opt('zti_description');
	}
	elseif (is_single()) {
		$title = trim(wp_title('',0)).$cnc.$name;//移除空格
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag) {
			$keywords = $keywords .$tag->name .",";
		}
		$keywords = rtrim($keywords,',');
		$description = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
	}
	elseif (is_page()) {
		$title = trim(wp_title('',0)).$cnc.$name;
		$keywords = zti_opt('zti_keyword');
		$description = zti_opt('zti_description');
	}
	elseif (is_category()) {
		$title = single_cat_title('', false).$cnc.$name;
		$keywords = single_cat_title('', false);
		$description = category_description();
	}
	elseif (is_tag()) {
		$title = single_tag_title('', false).$cnc.$name;
		$keywords = single_tag_title('', false);
		$description = tag_description();
	}
	elseif (is_author()) {
		$title = the_author_nickname('').$cnc.$name;
		$keywords = the_author_nickname('');
		$description = the_author_description('',0);
	}
	$title = trim(strip_tags($title));
	$keywords = trim(strip_tags($keywords));
	$description = trim(strip_tags($description));
	?>
	<title><?php _e($title,'ZTI'); ?></title>
	<meta name="keywords" content="<?php _e($keywords,'ZTI'); ?>" />
	<meta name="description" content="<?php _e($description,'ZTI'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon" />
	<base target="_blank">
	<?php 
} ?>