<?php
/**
 * Template Name: download
 */
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'download.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly!');

	if ($_GET['id'] != ''){
		$id = $_GET['id'];
		$url = get_post_meta($id, 'download_value', true);
	}else{
		die ('Please do not load this page directly!');
	}
?>
<?php get_header(); ?>
<main id="main" class="container">
	<div class="single-download panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-cloud-download"></i>下载资源</h3>
		</div>
		<div class="panel-body post-content">
			<aside class="download-list">
				<span>资源名称：<?php echo get_post($id)->post_title;?></span><br/>
				<span>上传时间：<?php $time = get_post($id)->post_date;echo $time;?></span><br/>
				<span>总浏览量：<?php if(function_exists('post_views')){ post_views(''); } ?></span><br/>
				<div class="text-center">
					<a href="<?php echo $url;?>" rel="nofollow external">
						<button class="btn btn-info btn-lg download-btn"><i class="fa fa-download"></i> 下载</button>
					</a>
				</div>
			</aside>
			<aside class="download-ad">
				<?php if(zti_opt('zti_list_ad') && zti_opt('zti_list_adcode')){
                    $adshow = stripslashes(zti_opt('zti_list_adcode'));
                    echo $adshow;
                } else {
                    echo "欢迎来访！ Enjoy yourself ！";
                }?>
			</aside>
			<div class="post-content">
				<hr/>
				<?php if(have_posts()):while (have_posts()) : the_post();the_content('');endwhile; endif;?>		
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>