<?php
	//设置计数规则
	function set_post_views() {
	    global $post;
	    $post_id = intval($post->ID);
	    $count_key = 'views';
	    $views = get_post_custom($post_id);
	    $views = intval($views['views'][0]);
	    if (is_single() || is_page()) {
	        if(!update_post_meta($post_id, 'views', ($views + 1))) {
	            add_post_meta($post_id, 'views', 1, true);
	        }
	    }
	}
	add_action('wp_head', 'set_post_views');

	//转化数字与单位 from BIGFA
	function format_number($number) {
	    if($number >= 1000) {
	       return  number_format($number/1000,1) . "k";   // NB: you will want to round this
	    }
	    else {
	        return $number;
	    }
	}

	//输出文章统计结果
	function post_views($post_id, $echo=true) {
	    $count_key = 'views';
	    $views = get_post_custom($post_id);
	    $views = intval($views['views'][0]);
	    $post_views = intval(post_custom('views'));
	    if ($views == '') {
	        //return '';
	        echo '0';
	    } else {
	        if ($echo) {
	            echo format_number($views);
	        } else {
	            return format_number($views);
	        }
	    }
	}
	//站点总浏览数
	function zti_all_view(){
	    global $wpdb;
	    $count=0;
	    $views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='views'");
	    foreach($views as $key=>$value){
	        $meta_value=$value->meta_value;
	        if($meta_value != ' '){
	            $count+=(int)$meta_value;
	        }
	    }
	    return format_number($count);
	}
?>