<main id="main" class="container">
	<div class="theme-content"  itemscope itemtype="http://schema.org/Article">
		<?php if(have_posts()):while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post theme-sections zti-bg">
				<div class="row">
					<section class="col-md-4">
						<div class="theme-img">
							<?php mythemes_thumbnail(350, 350);?>
						</div>
					</section>
					<section class="col-md-8 theme-title">
						<h2><?php the_title() ?></h2>
						<p class="theme-word"><?php echo zti_theme_meta('zti_theme_word');?></p>
						<div class="theme-price">
							<dl><dt>促销信息</dt><dd>未找到活动信息，请关注主题介绍内容</dd></dl>
							<dl><dt>主题价格</dt><dd><?php echo zti_theme_meta('price');?></dd></dl>
							<dl><dt>购买说明</dt><dd>因源码的可复制性，虚拟物品交易后概不退款，如继续购买则表示同意本条规则</dd></dl>
						</div>
						<ul class="theme-meta clearfix">
							<li>关注<span class="tm-count"><?php if(function_exists('post_views')){ post_views(''); } ?></span></li>
							<li>累计评价<span class="tm-count"><?php comments_popup_link('0', '1', '%'); ?></span></li>
							<li>喜欢<span class="tm-count"><?php echo get_post_meta($post->ID,'zti_zan',true);?></span></li>
						</ul>
						<div class="theme-buy-btn text-center">
							<a class="btn btn-info btn-md" href="<?php echo zti_theme_meta('demo');?>">在线演示</a>
							<a class="btn btn-danger btn-md" href="<?php echo zti_theme_meta('zti_buy');?>">购买主题</a>
						</div>
					</section>
				</div>
			</article>

			<main class="post-content zti-bg" itemprop="articleBody">
				<?php require_once get_stylesheet_directory() .'/lib/themetab.php';?>
				<?php require_once get_stylesheet_directory() .'/lib/likebtns.php';?>
			</main>
			<nav id="post-navi" class="clearfix zti-bg">
				<div class="col-sm-6">
					<?php if (get_previous_post()) { previous_post_link('%link','<i class="fa fa-arrow-left"></i> 上一篇'); } else {echo "没有上一篇";}; ?>
				</div>
				<div class="col-sm-6 text-right">
					<?php if (get_next_post()) { next_post_link('%link','下一篇 <i class="fa fa-arrow-right"></i>'); } else {echo "没有下一篇";}; ?>
				</div>
			</nav>
		<?php endwhile; endif;?>
			<section class="theme-sections zti-bg"><?php comments_template('', true); ?></section>
	</div>
</main>