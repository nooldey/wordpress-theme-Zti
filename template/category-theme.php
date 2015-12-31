<?php 
/*
*	FOR category-theme
*/
?>
<main id="main" class="container clearfix">
    <section id="category-theme">
        <header class="category-title zti-bg" >
            <h3>
                <?php echo single_cat_title( '当前分类：', false ) ; ?>
            </h3>
            <span><?php echo category_description( $category );?></span>
            <aside class="category-tags clearfix">
                <?php _e('筛选：') ;?>
                <?php zti_category_tags();?>
            </aside>
        </header>
        <div id="theme-content" class="row">
            <?php if(have_posts()):while (have_posts()) : the_post();get_template_part( 'content-theme');endwhile; else: ?>
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
</main>