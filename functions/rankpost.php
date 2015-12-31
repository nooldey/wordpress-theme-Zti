<?php
/* @function: 输出热门浏览、热门评论、热门推荐文章的函数*/
	function zti_topviews($num){
		global $post;
		$output = '';
		$args = array(
				'showposts' => $num,
				'post_status' => 'publish',
				'meta_key' => 'views',
				'orderby' => 'meta_value_num'
				);
		$postslist = get_posts($args);
		foreach ($postslist as $post){
			setup_postdata($post);
			$title = get_the_title();
			$url = get_permalink();
			$viewnum = post_views($post->ID,$echo=false);
			$output = "<li><i class='fa fa-chevron-circle-right'></i><a href='$url' title='$title'>$title</a><span class='pull-right'>$viewnum 次浏览</span></li>";
	        echo $output;
    	}
    	wp_reset_postdata();
    }

    function zti_newposts($num){
		global $post;
		$output = '';
		$args = array(
				'showposts' => $num,
				'post_status' => 'publish'
				);
		$postslist = get_posts($args);
		foreach ($postslist as $post){
			setup_postdata($post);
			$title = get_the_title();
			$url = get_permalink();
			$cat = get_the_category();
			$cat_name = get_cat_name($cat);
			$date = get_post_time('Y-m-d',$echo=false);
			$output = "<li><i class='fa fa-chevron-circle-right'></i><a href='$url' title='$title'> $title </a><span class='pull-right'>$date </span></li>";
	        echo $output;
    	}
    	wp_reset_postdata();
    }

    function zti_mostcomm($num){
		global $post;
		$output = '';
		$args = array(
				'showposts' => $num,
				'post_status' => 'publish',
				'orderby' => 'comment_count'
				);
		$postslist = get_posts($args);
		foreach ($postslist as $post){
			setup_postdata($post);
			$title = get_the_title();
			$url = get_permalink();
			$commnum = $post->comment_count;
			$output = "<li><i class='fa fa-chevron-circle-right'></i><a href='$url' title='$title'> $title </a><span class='pull-right'>$commnum 条评论</span></li>";
	        echo $output;
    	}
    	wp_reset_postdata();
    }

    function zti_mostlike($num){
		global $post;
		$output = '';
		$args = array(
				'showposts' => $num,
				'post_status' => 'publish',
				'meta_key' => 'zti_zan',
				'orderby' => 'meta_value_num'
				);
		$postslist = get_posts($args);
		foreach ($postslist as $post){
			setup_postdata($post);
			$title = get_the_title();
			$url = get_permalink();
			$likenum = get_post_meta($post->ID,'zti_zan',true);
			$output = "<li><i class='fa fa-chevron-circle-right'></i><a href='$url' title='$title'> $title </a><span class='pull-right'>$likenum 人点赞</span></li>";
	        echo $output;
    	}
    	wp_reset_postdata();
    }
?>