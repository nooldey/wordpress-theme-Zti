<?php get_header(); ?>
<main id="main" class="container">
	<div class="zti-bg clearfix">
		<section id="left-content" class="col-sm-8">
			<div style="text-align:center;padding-bottom:100px;">
				<div id="404">
					<p style="font-size:96px;padding:50px 0 20px 0px;font-family:'Microsoft YaHei' ">404</p>
				</div>
				<p style="padding:50px 0 20px 0px">页面出错或者没有此页面，将会在 <span id="mes" style="color:#3582c1;">5</span> 秒钟后返回首页！</p>
				<p>你也可以试着通过上方的搜索找到你想要看到的文章！</p>
			</div>
		</section>
		<section class="col-sm-4 border">
			<?php get_sidebar(); ?>
		</section>
	</div>
</main>
<?php get_footer(); ?>