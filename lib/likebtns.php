<footer class="post-footer clearfix">
	<div class="shang-btns clearfix">
		<span class="post-like">
			<a href="javascript:;" data-action="zan" data-id="<?php the_ID(); ?>" class="favorite <?php if(isset($_COOKIE['zti_zan_'.$post->ID])){echo 'done';} ?>">
				<i class="fa fa-thumbs-o-up"></i> 赞
				<span class="count">
					<?php if( get_post_meta($post->ID,'zti_zan',true) ){ echo get_post_meta($post->ID,'zti_zan',true);} else {echo '0';} ?>
				</span>
			</a>
		</span>
		<span class="alipay">
			<a data-toggle="modal" data-target="#alipay-modal">赏</a>
		</span>
		<span class="post-share">
			<a href="#comments"><i class="fa fa-comments"></i> 点评</a>
		</span>
	</div>
</footer>