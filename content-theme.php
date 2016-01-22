<div class="col-md-3 col-sm-6">
	<article id="post-<?php the_ID(); ?>" class="post format-theme zti-bg">
		<div class="thumbnail-img">
			<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
				<?php mythemes_thumbnail(300, 200);?>
				<section class="thumbnail-desc"><?php the_title() ?></section>
			</a>
		</div>
		<div class="theme-desc">
			<dl>
				<dt><?php _e('主题');?></dt>
				<dd>
					<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)),0,20,"..."); ?>
					</a>
				</dd>
			</dl>
			<dl>
				<dt><?php _e('主题作者');?></dt>
				<dd><?php echo zti_theme_meta('zti_coder');?></dd>
			</dl>
		</div>
		<aside class="theme-btn">
			<span class="btn btn-success btn-md">售价 <span class="price badge"><?php echo zti_theme_meta('price');?></span></span>
			<a class="btn btn-danger btn-md" href="<?php the_permalink(); ?>">获取主题</a>
		</aside>
	</article>
</div>