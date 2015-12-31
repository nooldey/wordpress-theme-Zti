<?php
/**
 * Options Framework
 *
 * @package   Options Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Don't load if optionsframework_init is already defined
if (is_admin() && ! function_exists( 'optionsframework_init' ) ) :

function optionsframework_init() {

	//  If user can't edit theme options, exit
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	// Loads the required Options Framework classes.
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-framework.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-framework-admin.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-interface.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-media-uploader.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-sanitization.php';

	// Instantiate the options page.
	$options_framework_admin = new Options_Framework_Admin;
	$options_framework_admin->init();

	// Instantiate the media uploader class
	$options_framework_media_uploader = new Options_Framework_Media_Uploader;
	$options_framework_media_uploader->init();

}

add_action( 'init', 'optionsframework_init', 20 );

endif;


/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'zti_opt' ) ) :
function zti_opt( $name, $default = false ) {

	$option_name = '';

	// Gets option name as defined in the theme
	if ( function_exists( 'optionsframework_option_name' ) ) {
		$option_name = optionsframework_option_name();
	}

	// Fallback option name
	if ( '' == $option_name ) {
		$option_name = get_option( 'stylesheet' );
		$option_name = preg_replace( "/\W/", "_", strtolower( $option_name ) );
	}

	// Get option settings from database
	$options = get_option( $option_name );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}
endif;

    //后台主题设置支持常用标签
	add_action('admin_init','optionscheck_change_santiziation', 100);
	function optionscheck_change_santiziation() {
	    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
	    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
	}
	function custom_sanitize_textarea($input) {
	    global $allowedposttags;
	    $custom_allowedtags["embed"] = array(
	        "src" => array(),
	        "type" => array(),
	        "allowfullscreen" => array(),
	        "allowscriptaccess" => array(),
	        "height" => array(),
	        "width" => array()
	      );
	    $custom_allowedtags["script"] = array( "type" => array(),"src" => array() );
	    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	    $output = wp_kses( $input, $custom_allowedtags);
	    return $output;
	}

	//输出分类信息
		function show_categorys(){
		$multicheck_cats_obj = get_categories();
		foreach ($multicheck_cats_obj as $category) {
		  $output = $category->cat_name."(<ins>".$category->cat_ID."</ins>)  ";
		  echo $output;  
		}
    }

	//添加自定义面板
		add_action('optionsframework_after','zti_opt_panel',100);
		function zti_opt_panel(){
			?>
			<div class="metabox-holder">
				<div id="optionsframework" class="postbox">
					<h3>关于</h3>
					<div class="inside">
						<h4>欢迎使用主题ZTIIII</h4>
						<span>感谢您使用<a href="http://ztiiii.com/">ztiiii.com</a> 出品的WordPress同名主题 ZTIIII !</span>
						<h4>分类信息</h4>
						<span><?php show_categorys();?> （注：无文章的分类不显示，显示格式为<b>分类名(分类id)</b>.）</span>
					</div>
				</div>
			</div>
			<?php
		}

	