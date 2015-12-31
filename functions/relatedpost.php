<?php
/*
* for related posts at single
*/
    function zti_related_posts(){
        global $post;
        $post_tags = wp_get_post_tags($post->ID);
        if ($post_tags) {
            foreach ($post_tags as $tag){
                $tag_list[] .= $tag->term_id;
            }
            $post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];
            $args = array(
                'tag__in' => array($post_tag),
                'category__not_in' => array(NULL),      
                'post__not_in' => array($post->ID),
                'showposts' => 10,               
                'caller_get_posts' => 1
            );
            $postslist = get_posts($args);
            foreach ($postslist as $post){
                setup_postdata($post);
                $title = get_the_title();
                $url = get_permalink();
                $output = "<li><i class='fa fa-chevron-circle-right'></i>
                    <a href='$url' title='$title' target='_blank'>$title</a></li>";
                echo $output;
            }
            wp_reset_postdata();
        }else{
            echo "No related post.";
        }
    }
?>