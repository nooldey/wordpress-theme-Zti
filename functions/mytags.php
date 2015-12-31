<?php
	//修改默认标签云
	function zti_tag_cloud_filter($args) {
		$args = array(
		"largest" => "10",
		"smallest" => "10",
		"number" => "30",
		"orderby" => "count",
		"order" => "DESC",
		"show_count" => 1
		);
		return $args;
		}
	add_filter("widget_tag_cloud_args", "zti_tag_cloud_filter");

	//输出指定分类下的所有标签
	function zti_category_tags(){
		global $post;
		$category = get_the_category();
		$cat = $category[0]->cat_ID;
		$args = array(
				'post_status' => 'publish',
				'category' => $cat
				);
		$postslist = get_posts($args);
		if ( have_posts() ) {
			foreach ($postslist as $post){
				setup_postdata($post);
				$post_tags = wp_get_post_tags($post->ID);
				if ($post_tags) {
					foreach ($post_tags as $tag) {
						$tag_list[] = $tag->term_id;
					}				
				}
			}
            $tagids = array_unique($tag_list);
			wp_tag_cloud($arg = array(
			"orderby" => "count",
			"order" => "DESC",
			"include" => $tagids,
			"largest" => "10",
			"smallest" => "10",
			"number" => "10"
			));
			wp_reset_postdata();
		} else {
			_e('<span class="err">Cannot find vcard !</span>');
		}
	}
?>