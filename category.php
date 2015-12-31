<?php get_header(); ?>
<?php 
/*
*  FOR choose category template.
*  @author: ztiiii.com
*  @date: 2015-11-25
*/  
$cat = zti_opt('zti_theme_cat');
if (in_category($cat) ){
    get_template_part('template/category-theme');
} else {
    get_template_part('template/category-default');
}
?>
<?php get_footer(); ?>