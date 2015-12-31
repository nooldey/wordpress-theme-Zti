<footer id="footer">
	<div class="container">
		<?php if(!wap() && zti_opt('zti_footbar') ) {?>
		<section class="foot-widget">
			<div class="footbar clearfix">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('widget_footer') ) {?>
					<p>请到后台添加小工具</p>
				<?php }?>
			</div>
		</section>
		<?php }?>
	</div>
	<section id="copyright" class="clearfix">
		<div class="copytext">
			<span>Copyright &copy; 2013-<?php echo gmdate(__('Y')); ?> <a href="<?php bloginfo('home');?>" ><?php bloginfo('name'); ?></a> 版权所有 .</span>  
			<span>Powered by <a href="http://wordpress.org/">Wordpress</a>,</span> 
			<span>Designed by <a href="http://ztiiii.com/" title="From - ztiiii.com">ZTIIII</a>.</span>
			<span><?php if (zti_opt('zti_tj')) {echo stripslashes(zti_opt('zti_tjcode'));}?></span>
		</div>
	</section>
	<div id="gototop" title="返回顶部"><i class="fa fa-rocket"></i></div>
</footer>
<?php wp_footer();?>
<?php 
foreach ( glob( get_template_directory() . '/lib/widgets/*-modals.php' ) as $filename ) {
	require $filename;
}?>
</body>
</html>