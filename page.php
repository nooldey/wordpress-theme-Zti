<?php get_header(); ?>
<main id="main">
	<div class="container">
		<div class="clearfix zti-bg">
			<section id="left-content" class="col-md-8">
				<div id="content" class="single">
					<?php if(have_posts()):while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" class="post">
							<header class="post-header">
								<h1 class="post-title">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>">
										<?php the_title() ?>
									</a>
								</h1>
							</header>
							<div class="post-meta">
								<span><i class="fa fa-calendar-o"></i> <?php the_time('Y-m-d'); ?></span>
								<span><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', '%'); ?>条评论</span>
								<span><i class="fa fa-eye"></i> <?php if(function_exists('post_views')){ post_views(''); } ?>次浏览</span>
							</div>
							<main class="post-content">
								<?php the_content(''); ?>
								<?php wp_link_pages(array(
								'before' => '<nav id="pagenavi">',
								'after' => '</nav>',
								'link_before' => '<span class="page-numbers">',
								'link_after' => '</span>'
								));?>
							</main>
						</article>
					<?php endwhile; endif;?>
					<?php comments_template('', true); ?>
				</div>
			</section>
			<section class="col-md-4 border">
				<?php get_sidebar(); ?>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>