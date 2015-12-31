<?php get_header(); ?>
	<?php
	$layout_index = zti_opt('zti_index_form');
	 if($layout_index == 'cms'){
		get_template_part('template/index-cms');
       } else if($layout_index == 'company'){
       	get_template_part('template/index-company'); 
       }else{
       	get_template_part('template/index-blog');
       } ?>
<?php get_footer(); ?>