<?php get_header(); ?>
<main id="main" class="container">
	<div class="zti-bg clearfix">
		<section id="left-content" class="col-md-8">
			<header class="category-title">
				<h3>
					<?php if(is_day()){
					$key = get_the_date();
					echo "日期：$key";
					} elseif(is_month()){
					$key = get_the_date('Y年m月');
					echo "月份：$key";
					}elseif(is_year()){
					$key = get_the_date('Y年');
					echo "年份：$key";
					}elseif( is_tag() ){
					echo "标签：";
					single_tag_title();
					}
					?>
            	</h3>
			</header>
			<div id="category-content">
				<?php if(have_posts()):while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; else: ?>
					<div class="post">
                        <div class="alert alert-warning">
                            <?php _e('该分类下暂时没有公开发布的文章，以下为系统随机推送的文章'); ?>
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