<?php 
/*
*
*	@for zti_new_metabox
*   from: http://www.ludou.org/creating-custom-write-panels-in-wordpress.html
*  为文章添加新的自定义面板
*/
	//创建自定义字段信息
	$new_meta_boxes = array(
		"zti_theme_word" => array("name" => "zti_theme_word","std" => "","title" => "促销信息"),
		"demo" => array("name" => "demo","std" => "","title" => "演示地址"),
		"download" => array("name" => "download","std" => "","title" => "下载地址"),
		"price" => array("name" => "price","std" => "0","title" => "主题售价"),
        "zti_buy" => array("name" => "zti_buy","std" => "","title" => "购买链接"),
		"zti_coder" => array("name" => "zti_coder","std" => "","title" => "主题作者"),
		"zti_renew" => array("name" => "zti_renew","std" => "","title" => "最后更新"),
		"zti_release" => array("name" => "zti_release","std" => "","title" => "最新版本"),
		"zti_wp_ver" => array("name" => "zti_wp_ver","std" => "","title" => "WP版本"),
		"zti_side_form" => array("name" => "zti_side_form","std" => "","title" => "分栏形式"),
		"zti_response" => array("name" => "zti_response","std" => "","title" => "响应特性"),
		"zti_pages" => array("name" => "zti_pages","std" => "","title" => "页面模板")
		);
	//创建自定义字段输入框
	function new_meta_boxes() {
  		global $post, $new_meta_boxes;
  		foreach($new_meta_boxes as $meta_box) {
    		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
    		if($meta_box_value == ""){
      			$meta_box_value = $meta_box['std'];
      		}
    		// 自定义字段标题
    		echo'<section style="width: 5em;padding: 5px;float: left;">'.$meta_box['title'].'：</section>';
    		// 自定义字段输入框
    		echo '<textarea cols="60" rows="1" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br/>';
    	}	
    	echo '<input type="hidden" name="zti_metaboxes_nonce" id="zti_metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
    }
    //创建自定义字段模块
    function create_meta_box() {
  		global $theme_name;
 		if ( function_exists('add_meta_box') ) {
    		add_meta_box( 'new-meta-boxes', '主题信息', 'new_meta_boxes', 'post', 'normal', 'high' );
  		}
	}
	//保存自定义字段信息数据
	function save_postdata( $post_id ) {
  		global $new_meta_boxes;
		if ( !wp_verify_nonce( $_POST['zti_metaboxes_nonce'], plugin_basename(__FILE__) )){
    		return;}
    	if ( !current_user_can( 'edit_posts', $post_id )){
    		return;}
		foreach($new_meta_boxes as $meta_box) {
    		$data = $_POST[$meta_box['name'].'_value'];
    		if($data == ""){
      			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    		}else{
      			update_post_meta($post_id, $meta_box['name'].'_value', $data);}
      	}
    }
    //绑定动作
    add_action('admin_menu','create_meta_box');
    add_action('save_post','save_postdata');
/*
*  @for cagegory-theme post meta
*  AUTHOR : ztiiii.com
*  自定义 主题展示列表及模板页面 调用函数
*  post_meta参数：price,demo,download
*  //zti_theme_meta($key) 支持简单的post meta参数
*  post_meta标签：作者，最后更新，最新版本，WP版本，分栏形式，布局，页面模板
*  //zti_theme_tags() 用于循环输出主题文章的meta标签
*/

	function zti_theme_meta($name){
		global $post; 
		$tmp = get_post_meta($post->ID, $name.'_value', true); 
		if ($tmp) {
			if ($name == 'demo' || $name == 'download') {
				$link .= get_bloginfo('home');
				$link .= "/$name?id=";
				$link .= $post->ID;
				$back = $link;
			}else{
				$back = $tmp;
			}
			return $back;
		}else{
			$default = '';
			$free = 'Free';
			$back = ($name == 'price') ? $free : $default;
			return $back;
		}
	}
	function zti_theme_tags(){
		global $post,$new_meta_boxes;
			$keys = array(
				'zti_coder',
				'zti_renew',
				'zti_release',
				'zti_wp_ver',
				'zti_side_form',
				'zti_response',
				'zti_pages',
				'price'
			);
		foreach ($keys as $key) {
			$key = $new_meta_boxes[$key];
			$name = $key['name'];
			$title = $key['title'];
			$meta = zti_theme_meta($name);
			$dt = "<dl><dt>".$title."</dt><dd>".$meta."</dd></dl>";
			echo $dt;
		}
	}
	function zti_theme_tags_short(){
		global $post,$new_meta_boxes;
			$keys = array(
				'zti_coder',
				'zti_renew',
				'zti_release',
				'zti_wp_ver',
				'zti_response'
			);
		foreach ($keys as $key) {
			$key = $new_meta_boxes[$key];
			$name = $key['name'];
			$title = $key['title'];
			$meta = zti_theme_meta($name);
			$dt = "<dl><dt>".$title."</dt><dd>".$meta."</dd></dl>";
			echo $dt;
		}
	}
?>