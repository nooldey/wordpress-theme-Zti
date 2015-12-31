<div id="single-sidebar">
    <aside class="author-meta hr-bottom">
    	<span class="author-img">
    		<?php echo get_avatar(get_the_author_meta('ID'),'128',$default,$alt=get_the_author($id) );?>
    	</span>
    	<section class="author-desc">
   			<h3><?php the_author_posts_link(''); ?></h3>
    		<h4><?php _e('About : ');?></h4>
    		<p><?php the_author_description(); ?></p>
    	</section>
    </aside>
    <aside class="article-meta hr-bottom">
    	<h4><?php _e('本文归类于');?></h4>
		<div class="article-cat">
			<?php the_category(' ') ?>
		</div>
		<h4><?php _e('关键词');?></h4>
		<div class="article-keyword">
			<?php echo get_the_tag_list(); ?>
		</div>
	</aside>
	<aside class="rel-articles">
		<h4>相关文章</h4>
		<ul>
			<?php zti_related_posts();?>
		</ul>
	</aside>
</div><!-- end #sidebar -->