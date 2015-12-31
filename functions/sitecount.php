<?php
/*站点统计信息*/
	function zti_site_count($type){
		global $wpdb;
		$post_count = wp_count_posts()->publish;
		$com_count = wp_count_comments()->total_comments;
		$link_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'");
		$date = zti_opt('zti_sitedate');
		$day_count = floor((time()-strtotime($date))/86400);
		$view_count = zti_all_view();
		$like_count = zti_all_like();
		$usr = split(',', wp_list_authors('echo=0&exclude_admin=0&hide_empty=0&optioncount=1&style=0'));
		$usr_count = count($usr); 
		$labels = array(
			'post' => array('title'=>__('文章','ZTI'),'count'=>$post_count),
			'comment' => array('title'=>__('评论','ZTI'),'count'=>$com_count),
			'link' => array('title'=>__('链接','ZTI'),'count'=>$link_count),
			'date' => array('title'=>__('建站日期','ZTI'), 'count'=>$date),
			'day' => array('title'=>__('建站天数','ZTI'), 'count'=>$day_count),
			'view' => array('title'=>__('浏览总数','ZTI'), 'count'=>$view_count),
			'like' => array('title'=>__('喜欢','ZTI'), 'count'=>$like_count),
			'usr' => array('title'=>__('注册用户','ZTI'), 'count'=>$usr_count)
			);
		$label = array();
		$label = $labels[$type];
		if ( $label && !empty($label['count']) ) {
			$outlist = '<li class="'.$label['title'].'">'.$label['title'].'：'.$label['count'].'</li>';
			return $outlist;
		}
	}
?>