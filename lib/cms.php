	<section class="zti-cms row">
		<?php 
			$cms_cat = explode(',', zti_opt('zti_cms_cat'));
			$i = 1;
			foreach ($cms_cat as $category) { ?>
		<section class="col-md-6">
			<div class="cms-box cms-<?php echo $i;?>">
				<?php query_posts( array(
					'showposts' => 1,
					'cat' => $category,
					'post__not_in' => $do_not_duplicate
					));
					while (have_posts()) : the_post();
				?>
				<div class="cms-title clearfix">
					<h2>
						<span class="cms-cat">
						<i class="fa <?php
						$faicon = array(
							'1' => 'fa-wordpress',
							'2' => 'fa-code',
							'3' => 'fa-file-text-o',
							'4' => 'fa-calendar-plus-o',
							'5' => 'fa-book',
							'6' => 'fa-database'
							);
						$faicon_default = 'fa-wordpress';
						$icon_class = $i ? $faicon[$i] : $faicon_default;
						echo $icon_class;
						?>"></i>
						<?php single_cat_title(); ?></span>
						<a href="<?php echo get_category_link($category);?>"><span class="pull-right">更多<i class="fa fa-plus-circle"></i></span></a>
					</h2>
				</div>
				<div class="cms-content">
					<ul>
						<li class="first-post clearfix">
							<?php mythemes_thumbnail(200,150);?>
							<h3>
								<a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute();?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)),0,32,"..."); ?></a>
							</h3>
							<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"..."); ?></p>
						</li>
						<?php endwhile;?>
						<?php query_posts(array(
							'showposts' => 5,
							'cat' => $category,
							'offset' => 1,
							'post__not_in' => $do_not_duplicate
							));
							while (have_posts()) : the_post();
						?>
						<li>
							<a href="<?php the_permalink();?>" rel="bookmark" title="<?php if(has_excerpt()){ the_excerpt(); }else{
								echo mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,100,"……");}?>">
								<i class="fa fa-chevron-circle-right"></i>
								<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)),0,80," "); ?>
							</a>
							<span class="pull-right"><?php the_time('m-d'); ?></span>
						</li>
					<?php endwhile;?>
					</ul>
				</div>
			</div>
		</section><!--CMS end-->
		<?php $i++; }?>
	</section>