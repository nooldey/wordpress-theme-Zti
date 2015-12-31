<?php 
/*自定义登录窗口的显示信息*/
/*自定义登录页面的LOGO图片*/
function my_custom_login_logo() {
	if (zti_opt('zti_logo')) {
		$logoimg = zti_opt('zti_logo');
	}else{
		$logoimg = get_bloginfo('template_directory').'/images/logo.png';
	}
    echo '<style>h1 a {background-image:url('.$logoimg.')!important;}</style><link rel="stylesheet" id="wp-admin-css" href="'.get_bloginfo('template_directory').'/css/login.css" type="text/css"/>';
}
add_action('login_head', 'my_custom_login_logo');
/*自定义登录页面的LOGO链接为首页链接*/
add_filter('login_headerurl', create_function(false,"return get_bloginfo('url');"));
/*自定义登录页面的LOGO提示为网站名称*/
add_filter('login_headertitle', create_function(false,"return get_bloginfo('name');"));
//在登录框添加额外的信息
function custom_login_message() {
	$message = zti_opt('zti_message_text');
	if ($message) {
		$output .= '<div class="custom-message">';
		$output .= $message;
		$output .= '</div>';
		echo $output;
	}
}
add_action('login_form', 'custom_login_message');
add_action('register_form', 'custom_login_message');
add_action('lostpassword_form', 'custom_login_message');
?>