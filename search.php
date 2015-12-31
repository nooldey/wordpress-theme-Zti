<?php get_header(); ?>
<main id="main" class="container">
	<div class="zti-bg clearfix">
		<section id="left-content" class="col-md-8">
			<header class="category-title">
				<h2>
					关键词：<?php the_search_query(); ?>
				</h2>
			</header>
			<div id="category-content">
				<?php if(have_posts()):while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; else: ?>
				<div class="post">
                    <div class="alert alert-warning">
                        <?php _e('未搜索到包含关键词的文章，以下为系统随机推送的文章'); ?>
                    </div>
                    <div class="category-content">
                            <?php
                                $rand_posts = get_posts('numberposts=10&orderby=rand');
                                foreach( $rand_posts as $post ) :
                                    get_template_part( 'content', get_post_format() );
                                endforeach; 
                            ?>                  
                    </div>
                </div>
				<?php endif;?>
			</div>
			<nav id="pagenavi">
	            <?php echo paginate_links(array(
	              'prev_next'          => 1,
	              'before_page_number' => '',
	              'mid_size'           => 2,
	              ));
	            ?>
			</nav>
		</section>
		<section class="col-md-4 border">
			<?php get_sidebar(); ?>
		</section>
	</div>
</main>
<?php get_footer(); ?>