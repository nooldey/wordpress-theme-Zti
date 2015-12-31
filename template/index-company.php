<?php
/**
 * Index Template of ZTIIII WordPress Theme
 * for company index
 * @author 主题站（ztiiii）
 * @link http://ztiiii.com/
**/
?>
<!--幻灯片-->
<?php if (zti_opt('zti_slide_sw') == '1') {
      require_once get_stylesheet_directory() .'/lib/slider.php';
    } ?>
<!--产品服务-->
<div class="container">
  <?php require_once get_stylesheet_directory() .'/lib/fantasy.php';?>
</div>
<!--主题展示-->
<section class="wpthemes">
  <div class="container">
  <h3>WordPress主题展示</h3>
  <small>——简约而又强大的精品主题</small>
    <div class="row">
      <?php
        $com_cat1 = zti_opt('zti_com_cat1');
        query_posts('cat='.$com_cat1.'& showposts=5');//cat为指定分类ID号
        while(have_posts()):the_post();?>
      <div class="col-xs-3 ">
        <div class="inner-cat">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title() ?>"><?php mythemes_thumbnail(360,280);?></a>
          <p class="hidden-sm"><?php echo mb_strimwidth(get_the_title(), 0, 18, ''); ?></p>
        </div>
      </div>
      <?php endwhile;wp_reset_query(); ?>
    </div>
  </div>
</section>

<!--最新动态-->
<section class="bigpost">
  <div class="container">
      <div class="text-center">
        <h3>最新资讯</h3>
        <small>——关注创新每一步</small>
      </div>
      <?php
        $com_cat2 = zti_opt('zti_com_cat2');
        query_posts('cat='.$com_cat2.'& showposts=2');//cat为指定分类ID号
        while(have_posts()):the_post();?>
        <div class="row newposts">
          <aside class="col-sm-6 first">
            <div class="post-content">
              <?php if(preg_match('/<!--more.*?-->/', $post->post_content)){
                the_content("");
                }else{
                  echo "<p>" . mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 450,"..."). "</p>";
                }
              ?>
            </div>
          </aside>
          <aside class="col-sm-6">
            <div class="post-thumbnail"><a href="<?php the_permalink() ?>" rel="bookmark"><?php mythemes_thumbnail(500, 280);?></a></div>
          </aside>
        </div>
        <?php endwhile;wp_reset_query(); ?>
  </div>
</section>