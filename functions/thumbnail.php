<?php
/*Post thumbnail*/
	//add_theme_support( 'post-thumbnails' );
	
	function mythemes_thumbnail($width=44, $height=44){
		global $post;
		$title = $post->post_title;
		$dir = get_bloginfo('template_directory');
		if( has_post_thumbnail() ){
			$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
			$src = $timthumb_src[0];
			$post_img_src = "$dir/lib/timthumb.php&#63;src=$src&#38;w=$width&#38;h=$height&#38;zc=1&#38;q=100";
		}else{
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/\<img.+?src="(.+?)".*?\/>/is',$post->post_content,$matches ,PREG_SET_ORDER);
			$cnt = count( $matches );
			if($cnt>0){
				$src = $matches[0][1];
				$post_img_src = "$dir/lib/timthumb.php&#63;src=$src&#38;w=$width&#38;h=$height&#38;zc=1&#38;q=100";
			}else{ // thumb
				$post_img_src = "$dir/lib/timthumb.php&#63;src=$dir/images/default.png&#38;w=$width&#38;h=$height&#38;zc=1&#38;q=100";
			}
		}
		echo "<img class='img-responsive' src='$post_img_src' alt='$title' width='$width' height='$height' />";
	}

?>