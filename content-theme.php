<div class="col-md-4">
	<article id="post-<?php the_ID(); ?>" class="post format-theme zti-bg">
		<div class="thumbnail-img">
			<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php mythemes_thumbnail(500, 500);?></a>
		</div>
		<div class="theme-desc">
			<?php zti_theme_tags_short();?>
		</div>
		<aside class="theme-btn">
			<a class="btn btn-info btn-md" href="<?php echo zti_theme_meta('demo');?>">在线演示</a>
			<span class="btn btn-success btn-md">主题售价 <span class="price badge"><?php echo zti_theme_meta('price');?></span></span>
			<a class="btn btn-danger btn-md" href="<?php the_permalink(); ?>">获取主题</a>
		</aside>
	</article>
</div>