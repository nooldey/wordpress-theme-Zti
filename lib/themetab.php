<ul class="nav nav-tabs nav-themes" role="tablist">
	<li role="presentation" class="active">
		<a href="#feature" role="tab" data-toggle="tab" aria-controls="feature">主题概况</a>
	</li>
	<li role="presentation" class="">
		<a href="#intro" role="tab" data-toggle="tab" aria-controls="intro">详细介绍</a>
	</li>
	<li role="presentation" class="">
		<a href="#notice" role="tab" data-toggle="tab" aria-controls="notice">常见问题</a>
	</li>
</ul>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active theme-tags" id="feature">
        <?php zti_theme_tags();?>
        <dl>
        	<dt>购买主题</dt>
        	<dd><a class="btn btn-danger btn-xs" href="<?php echo zti_theme_meta('zti_buy');?>"><i class="fa fa-shopping-cart"></i> 支持正版</a></dd>
        </dl>
        <dl>
        	<dt>在线演示</dt>
        	<dd><a class="btn btn-success btn-xs" href="<?php echo zti_theme_meta('demo');?>"><i class="fa fa-laptop"></i> 在线预览</a></dd>
        </dl>
        <dl>
        	<dt>下载主题</dt>
        	<dd><a class="btn btn-info btn-xs" href="<?php echo zti_theme_meta('download');?>"><i class="fa fa-download"></i> 去下载</a></dd>
        </dl>
        <dl>
        	<dt>本文编辑</dt>
        	<dd><?php the_author(); ?></dd>
        </dl>
        <dl>
            <dt>主题标签</dt>
            <dd><?php the_tags(''); ?></dd>
        </dl>
        <dl>
        	<dt>推荐主机</dt>
        	<dd><a href="<?php echo zti_opt('zti_theme_adlink');?>" rel="nofollow external">使用推荐的云主机，主题效果发挥更佳</a></dd>
        </dl>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="intro">
		<?php the_content(''); ?>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="notice">
	    <p><?php echo zti_opt('zti_download_notice'); ?></p>
	</div>
</div>