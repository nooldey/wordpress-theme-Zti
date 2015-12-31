<?php 
/* 后台编辑器强化
	/* --------------- */
	function add_more_buttons($buttons){  
		$buttons[] = 'fontsizeselect';  
		$buttons[] = 'styleselect';  
		$buttons[] = 'fontselect';  
		$buttons[] = 'hr';  
		$buttons[] = 'sub';  
		$buttons[] = 'sup';  
		$buttons[] = 'cleanup';  
		$buttons[] = 'image';  
		$buttons[] = 'code';  
		$buttons[] = 'media';  
		$buttons[] = 'backcolor';  
		$buttons[] = 'visualaid';  
		return $buttons;  
	}  
	add_filter("mce_buttons_3", "add_more_buttons");

	/* 在 WordPress 编辑器添加"下一页"按钮
	/* ------------------------------------ */
	function zti_add_next_page_button($mce_buttons) {
		$pos = array_search('wp_more',$mce_buttons,true);
		if ($pos !== false) {
			$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
			$tmp_buttons[] = 'wp_page';
			$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
		}
		return $mce_buttons;
	}
	add_filter('mce_buttons','zti_add_next_page_button');
?>