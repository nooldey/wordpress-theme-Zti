<main id="main" class="container">
	<div class="zti-bg clearfix">
		<section id="left-content" class="col-md-9 border">
	    	<div class="single-content">
				<?php if(have_posts()):while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" class="post" itemscope itemtype="http://schema.org/Article">
						<header class="post-header">
							<h3 class="post-title">
								<?php the_title() ?>
							</h3>
						</header>
						<div class="post-meta">
							<span><i class="fa fa-calendar-o"></i> <?php the_time('Y-m-d'); ?></span>
							<span><i class="fa fa-comments"></i> <?php comments_popup_link('0', '1', '%'); ?>条评论</span>
							<span><i class="fa fa-eye"></i> <?php if(function_exists('post_views')){ post_views(''); } ?>次浏览</span>
						</div>
						<main class="post-content"  itemprop="articleBody">
							<?php the_content(''); ?>
							<?php wp_link_pages(array(
								'before' => '<nav id="pagenavi">',
								'after' => '</nav>',
								'link_before' => '<span class="page-numbers">',
								'link_after' => '</span>'
								));?>						
						</main>
						<?php require_once get_stylesheet_directory() .'/lib/likebtns.php';?>
					</article>
					<nav id="post-navi" class="clearfix">
						<div class="col-sm-6">
							<?php if (get_previous_post()) { previous_post_link('%link','<i class="fa fa-arrow-left"></i> 上一篇'); } else {echo "没有上一篇";}; ?>
						</div>
						<div class="col-sm-6 text-right">
							<?php if (get_next_post()) { next_post_link('%link','下一篇 <i class="fa fa-arrow-right"></i>'); } else {echo "没有下一篇";}; ?>
						</div>
					</nav>
				<?php endwhile; endif;?>
				<?php comments_template('', true); ?>
			</div>
		</section>
		<section class="col-md-3">
			<?php require_once get_stylesheet_directory() .'/template/sidebar-single.php';?>
		</section>
	</div>
</main>