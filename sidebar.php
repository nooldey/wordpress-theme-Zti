<?php if(!wap()) {?>
    <div id="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('widget_right') ) :?>
			<p>请到后台添加小工具</p>
		<?php endif;?>
    </div><!-- end #sidebar -->
<?php }?>