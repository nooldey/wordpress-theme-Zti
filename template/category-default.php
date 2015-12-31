<main id="main" class="container">
    <div class="clearfix zti-bg">
        <section id="left-content" class="col-md-8">
            <header class="category-title" >
                <h3>
                    <?php echo single_cat_title( '当前分类：', false ) ; ?>
                </h3>
                <span><?php echo category_description( $category );?></span>
                <aside class="category-tags clearfix">
                    <?php _e('筛选：') ;?>
                    <?php zti_category_tags();?>
                </aside>
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