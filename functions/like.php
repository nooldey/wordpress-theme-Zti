<?php
/*from bigfa*/
    add_action('wp_ajax_nopriv_zti_like', 'zti_like');
    add_action('wp_ajax_zti_like', 'zti_like');
    function zti_like(){
        global $wpdb,$post;
        $id = $_POST["um_id"];
        $action = $_POST["um_action"];
        if ( $action == 'zan'){
            $zti_raters = get_post_meta($id,'zti_zan',true);
            $expire = time() + 99999999;
            $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
            setcookie('zti_zan_'.$id,$id,$expire,'/',$domain,false);
            if (!$zti_raters || !is_numeric($zti_raters)) {
                update_post_meta($id, 'zti_zan', 1);
            } else {
                update_post_meta($id, 'zti_zan', ($zti_raters + 1));
            }
        echo get_post_meta($id,'zti_zan',true);
        } 
        die;
    }

    function zti_all_like(){
        global $wpdb;
        $count=0;
        $likes= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='zti_zan'");
        foreach($likes as $key=>$value){
            $meta_value=$value->meta_value;
            if($meta_value != ' '){
                $count+=(int)$meta_value;
            }
        }
        return $count;
    }
?>