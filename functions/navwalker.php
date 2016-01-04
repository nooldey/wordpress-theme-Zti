<?php
/**
 * 主导航菜单
 * https://codex.wordpress.org/Class_Reference/Walker
 */
class zti_bootstrap_navwalker extends Walker {

  public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
  public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    if( $depth == 0 ){
      $output .= '<ul class="dropdown-menu" role="menu">';
    }else{
      $output .= '<li class="divider"></li>';
    }
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    if( $depth == 0 ){ $output .= "</ul>";}
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $caret = $fa_icon = $item_output = '';

  /* 显示分类描述
  if( $depth > 0 && $item->description ){
      $item_output .= '<li role="presentation" class="dropdown-header">'.$item->description.'</li>';
    }
    */
    $atts = $atts_class = array();
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
    $atts['title']   = ! empty( $item->title )        ? esc_attr( $item->attr_title )        : '';
    $class_names = (array) get_post_meta( $item->ID, '_menu_item_classes', true );
    
    if ( $class_names ){
      foreach ( $class_names as $class_key=>$class_name ){

        $class_name = esc_attr( $class_name );
        
        //~ 把第一个以 fa- 开头的自定义CSS类作为 fa 图标的类名
        if ( strpos( $class_name , 'fa-' )!==false && empty($fa_icon) ){
          $fa_icon = '<i class="fa ' . $class_name . '"></i> ';
        }
        //~ 去除所有以 fa- 开头和名为 fa 的自定义CSS类
        if ( strpos( $class_name , 'fa-' )===0 || $class_name=='fa' ){
          unset($class_names[$class_key]);
        }
      }
    }
    
    //~ 当前为一级菜单项而且拥有二级菜单时添加二级菜单的处理
    if ( $depth == 0 && ($args->depth)>=0 && $this->has_children ){
      $class_names[] = 'dropdown';
      $atts_class[] = 'dropdown-toggle';
      $atts['data-toggle'] = 'dropdown';
      $caret = ' <span class="caret"></span></a>';
    }
    
    if ( empty( $item->url ) && empty($atts['data-toggle']) ){
      $atts_class[] = 'navbar-text';
    }
    if (
      $item->current 
  //    || $item->current_item_ancestor 
      || $item->current_item_parent 
      || ( !empty($item->url) && untrailingslashit($item->url)==untrailingslashit(sti_get_current_page_url()) ) 
      || ( !empty($item->url) && (is_home()||is_front_page()) && untrailingslashit($item->url)==untrailingslashit(get_option('home')) )
      ) {

      $class_names[] = 'active';

      // 不要删除不要更改，这是菜单缓存判断用的
    $item_output .= '<!--active_item-->';
  }

  $class_names[] = 'menu-item';
  $class_names = join( ' ', array_unique(array_filter(apply_filters( 'nav_menu_css_class', array_filter( $class_names ), $item, $args ) )));
  $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
  $item_output .= '<li' . $class_names .'>';
  $atts['class'] = join('', $atts_class);
  $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
  $attributes = '';
  foreach ( $atts as $attr => $value ) {
    if ( ! empty( $value ) ) {
      $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
      $attributes .= ' ' . $attr . '="' . $value . '"';
    }
  }

  $item_output .= $args->before;
  $item_output .= ( $item->url || !empty($atts['data-toggle']) ) ? '<a'. $attributes .' itemprop="url">' : '<div'. $attributes .'>';
  $item_output .= $args->link_before . $fa_icon . apply_filters( 'the_title', $item->title, $item->ID ) . $caret . $args->link_after;
  $item_output .= ( $item->url || !empty($atts['data-toggle']) ) ? '</a>' : '</div>';
  $item_output .= $args->after;

  $output .= $item_output;

}

function end_el( &$output, $item, $depth = 0, $args = array() ) {
  $output .= "</li>";
}

}
?>