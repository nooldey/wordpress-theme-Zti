<?php
/*构建小工具*/
/*侧边广告*/
class ZtiAdWidget extends WP_Widget{
	function __construct(){
		parent::__construct('adsense',__('Z·侧边栏广告','ZTI'),array('classname' => 'widget_adsense', 'description' => __('显示在侧边栏的广告','ZTI') ) ); 
	}
	function widget($args,$instance){
		extract($args);
		$title = apply_filters('widgets_title',$instance['title']);
		$code = $instance['code'];

		$content = $before_widget;
		if ($title) $content .= $before_title.$title.$after_title;
		$content .= '<aside class="WidgetAd">';
		
		if (!empty($code)) {
			$content .= stripcslashes($code);
		}else if(zti_opt('zti_side_ad') && zti_opt('zti_side_adcode')){
            $content .= stripslashes(zti_opt('zti_side_adcode'));
        } else {
            $content .= __('请设置代码','ZTI');
        }

        $content .= '</aside>';
		$content .= $after_widget;
        echo $content;

        
	}
	function update($new_instance,$old_instance){
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['code'] = $new_instance['code'];
		return $instance;
	}
	function form($instance){
		if (isset($instance['title'])){$title = $instance['title'];}
		else {$title = __('侧边栏广告', 'ZTI');}
		if (isset($instance['code'])){$code = $instance['code'];}
		else {$code = __('请设置代码', 'ZTI');}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('标题:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('code');?>" name="<?php echo $this->get_field_name('code'); ?>" placeholder="粘贴广告代码到这，留空则显示默认广告" type="text"><?php echo stripcslashes($instance['code']);?></textarea>
		<?php 
	}
}
/*站点统计*/
class ZtiAnalyticsWidget extends WP_Widget{
	public function __construct(){
		parent::__construct('analytics',__('Z·站点统计','ZTI'),array('classname' => 'widget_analytics','description' => __('站点统计信息','ZTI')));
	}
	function widget($args,$instance){
		$data = array();
		foreach ($instance as $type=>$value) {
			if ($value!='on') continue;
			$list = zti_site_count($type);
			if ( !empty($list) ) $data[$type] = $list;
		}
		if ( empty($data) ) return;

		extract($args);
		$title = apply_filters('widgets_title',$instance['title']);

		$content = $before_widget;
		if ($title) 
			$content .= $before_title.$title.$after_title;
		$content .= '<aside class="WidgetAnaly"><ul>';
		
		foreach ($data as $key) {
			$content .= $key;
		}

		$content .= '</ul></aside>';
        $content .= $after_widget;
        echo $content;
	}
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array());
		$label = array('title','post','comment','link','date','day','view','like','usr');
		foreach ($label as $key) {
			$instance[$key] = strip_tags($new_instance[$key]);
		}
		return $instance;
	}
	function form($instance){
		$instance = wp_parse_args((array)$instance,array('title' => '','post' => 'on','comment' => 'on','link' => 'on','date' => 'on','day' =>'on','view' =>'on','like' =>'on','usr' =>'on'));
		if (isset($instance['title'])){$title = $instance['title'];}
		else {$title = __('站点统计', 'ZTI');}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('标题：');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p><?php _e('要显示的项目：','ZTI') ?></p>
		<p>
			<?php
			$label = array(
				'post' => __('文章总数','ZTI'),
				'comment' => __('评论总数','ZTI'),
				'link' => __('链接数目','ZTI'),
				'date' => __('建站日期','ZTI'),
				'day' => __('建站天数','ZTI'),
				'view' => __('浏览总数','ZTI'),
				'like' => __('喜欢总数','ZTI'),
				'usr' => __('用户数量','ZTI')
			);
			foreach ($label as $key=>$value) {
				$output = '<input class="checkbox" type="checkbox" id="';
				$output .= $this->get_field_id($key);
				$output .= '" name="';
				$output .= $this->get_field_name($key);
				$output .= '"';
				if( isset($instance[$key])&&trim($instance[$key])=='on' ) 
					$output .='checked="checked"';
				$output .= '><label for="';
				$output .= $this->get_field_id($key);
				$output .= '">';
				$output .= $value;
				$output .= '</label><br>';
				echo $output;
			}
			?>
		</p>
		<?php 
	}
}

/*批量注册小工具*/
function zti_add_widgets(){
	register_widget('ZtiAdWidget');
//	register_widget('ZtiAnalyticsWidget');
}
add_action('widgets_init','zti_add_widgets')
?>