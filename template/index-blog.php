<?php
/**
 * Index Template of ZTIIII WordPress Theme
 * for blog index 页面待重组
 * @author 主题站（ztiiii）
 * @link http://ztiiii.com/
**/
?>
<div id="main" class="clearfix">
	<div id="primary">
    	<div id="content">
			<?php if(have_posts()):while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; else: ?>
				<div class="post">
					<div class="post-header">
						<h1 class="post-title"><?php _e('暂无文章'); ?></h1>
					</div>
					<div class="post-content">
						<ul>
							<?php
								$rand_posts = get_posts('numberposts=5&orderby=comments');
								foreach( $rand_posts as $post ) :
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
						</ul>					
					</div>
				</div>
			<?php endif;?>
		</div>
		<div id="pagenavi">
                    <?php echo paginate_links(array(
                          'prev_next'          => 1,
                          'before_page_number' => '',
                          'mid_size'           => 2,
                     ));?>
		</div>
    </div>
<?php get_sidebar(); ?>