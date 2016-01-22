<section class="thumbpost row">
    <?php
      query_posts(array(
      'post__in'=> get_option('sticky_posts'),
      'showposts'=> 4
      ));//cat为指定分类ID号
      while(have_posts()):the_post();?>
    <div class="col-md-3 col-xs-6 thumbpost-li">
    	<aside class="thumbcard">
    		<div class="thumbcard-img">
    			<?php mythemes_thumbnail(350,320);?>
    		</div>
    		<div class="thumbcard-content">
    			<h3><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)),0,16," "); ?></h3>
        		<p>
        		<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"……");?>
        		</p>
        		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>">
        			<span class="btn btn-sm btn-primary">查看详细</span>
        		</a>
        	</div>
      </aside>
    </div>
    <?php endwhile;wp_reset_query(); ?>
  </section>