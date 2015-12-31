<?php
/**
	* 移除 emoji's 
	*/
	function disable_emojis() {
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
	    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
	    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'disable_emojis' );
	/**
	 * remove the tinymce emoji plugin.
	 */
	function disable_emojis_tinymce( $plugins ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}

	//移除谷歌sans字体
	function remove_open_sans() { 
	wp_deregister_style( 'open-sans' ); 
	wp_register_style( 'open-sans', false ); 
	wp_enqueue_style('open-sans',''); 
	} 
	add_action( 'init', 'remove_open_sans' );

	/* ------------------------------------------------------------------------- *
	 *  移除头部多余信息
	/* ------------------------------------------------------------------------- */	
	function wpbeginner_remove_version(){
		return;
	}
	add_filter('the_generator', 'wpbeginner_remove_version');//wordpress的版本号
	remove_action('wp_head', 'feed_links', 2);//包含文章和评论的feed
	remove_action('wp_head','index_rel_link');//当前文章的索引
	remove_action('wp_head', 'feed_links_extra', 3);// 额外的feed,例如category, tag页
	remove_action('wp_head', 'start_post_rel_link', 10, 0);// 开始篇 
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);// 父篇 
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // 上、下篇. 
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink 
	remove_action('wp_head', 'rel_canonical' );
?>