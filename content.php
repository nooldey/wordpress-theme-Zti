<article id="post-<?php the_ID(); ?>" class="post format-post">
	<header class="content-header">
		<h2 class="content-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title() ?>">
				<i class="fa fa-pencil-square-o"></i><?php the_title() ?>
			</a>
		</h2>
	</header>
	<?php if( zti_opt('zti_thumb') ) { ?>
		<div class="post-with-thumbnail clearfix">
			<div class="post-thumbnail">
				<?php mythemes_thumbnail(300, 200);?>
			</div>
			<div class="the-content">
				<?php if(preg_match('/<!--more.*?-->/', $post->post_content)){
					the_content("");
					}else{
						$content = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 280,"...");
						echo $content;
					}
				?>
			</div>
		</div>
	<?php }else{?>
		<div class="the-content">
			<?php if(preg_match('/<!--more.*?-->/', $post->post_content)){
				the_content("");
				}else{
					$content = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 280,"...");
					echo $content;				}
			?>
		</div>
	<?php }?>
</article>