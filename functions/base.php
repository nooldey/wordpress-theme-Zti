<?php
	// 加载 css && javascript 文件 
	add_action('wp_enqueue_scripts', 'mythemes_script');
	function mythemes_script() {
		// jquery library
        $jsot = array(
	        'code' => 'http://code.jquery.com/jquery-2.0.3.min.js', 
	        'msdn' => 'http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.min.js',
			'360' => 'http://libs.useso.com/js/jquery/2.0.3/jquery.min.js',
			'baidu' => 'http://apps.bdimg.com/libs/jquery/2.0.3/jquery.min.js',
			'self' => get_bloginfo('template_directory').'/js/jquery.min.js'
        	);
        $jsurl = get_bloginfo('template_directory').'/js/jquery.min.js';
        $dir = get_bloginfo('template_directory');
        wp_dequeue_script('jquery');
        wp_enqueue_script( 'jq', zti_opt('zti_js') ? $jsot[zti_opt('zti_js')] : $jsurl, array(), '2.0.3', false);
		// Bootstrap 3.3.5
		wp_enqueue_style('bt', $dir.'/css/bootstrap.min.css',array(),'3.3.5','all');
		wp_enqueue_script( 'bt', $dir. "/js/bootstrap.min.js", array(), '3.3.5', 'all');
		// The modified of style.css
		$timer = @filemtime(TEMPLATEPATH .'/style.css');
		// Register style.css
		wp_enqueue_style('style', $dir.'/style.css', array(), $timer, 'screen');
		wp_enqueue_style('animation', $dir.'/css/animation.css', array(), $timer, 'screen');
		wp_enqueue_style('font', $dir.'/css/font-awesome.min.css', array(),'4.4.0', 'screen');
		if ( is_singular() || is_page()){			
			wp_enqueue_script( 'single', $dir. "/js/single.js", array(), $timer, false);
		}
		wp_enqueue_script( 'custom', $dir. "/js/custom.js", array(), $timer, false);
	}

	/* 登录用户浏览站点时不显示工具栏 */
	add_filter('show_admin_bar', '__return_false');

	// 文章类型
	//add_theme_support( 'post-formats', array('status'));

	/*添加后台链接管理*/
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
	
	// 添加导航菜单
	if ( function_exists('register_nav_menus') ) {
		register_nav_menus(array('primary' => '导航菜单'));
	}

	// 添加侧边栏
	function custom_widgets() {
		register_sidebar(array(
			'name' => __('右侧边栏','ZTI'),
			'id' => 'widget_right',
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		));
		register_sidebar(array(
			'name' => __('底部边栏','ZTI'),
			'id' => 'widget_footer',
			'before_widget' => '<div id="%1$s" class="col-sm-6 col-md-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-heading">',
			'after_title' => '</h4>'
		));
	}
	add_action( 'widgets_init', 'custom_widgets' );

	// 加载主题设置
	if (!function_exists('optionsframework_init')){
	    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
	    require_once get_stylesheet_directory() . '/inc/options-framework.php';
	    require_once get_stylesheet_directory() . '/options.php';
        }

	//设置gravatar头像
		if( !zti_opt('zti_gra') || zti_opt('zti_gra') == 'none' ){
		}else if( zti_opt('zti_gra') == 'ssl' ){
		    add_filter('get_avatar', 'ssl_get_avatar');
		}else if( zti_opt('zti_gra') == 'duoshuo' ){
		    add_filter('get_avatar', 'duoshuo_get_avatar', 10, 3);
		}
	//官方Gravatar头像调用ssl头像链接
		function ssl_get_avatar($avatar) {
		    $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/', '<img src="https://secure.gravatar.com/avatar/$1" class="avatar avatar-$2" height="$2" width="$2">', $avatar);
		    return $avatar;
		}

	//多说官方Gravatar头像调用
		function duoshuo_get_avatar($avatar) {
		    $avatar = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "gravatar.duoshuo.com", $avatar);
		    return $avatar;
		}

    // 识别移动端
	function wap(){
		if(stristr($_SERVER['HTTP_VIA'],"wap")){
		// 先检查是否为wap代理，准确度高
			return true;
		}elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){
		// 检查浏览器是否接受 WML.
			return true;
	   }elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){//检查USER_AGENT
			return true;
		}else{
			return false;
	   }

	}

	// 网站维护503模式
	function wp_site_weihu(){
		if(zti_opt('zti_weihu')){
			if(!current_user_can('edit_themes') || !is_user_logged_in()){
			$out503 = 'ZTIIII网站正在维护中，程序猿正在疯狂加班，更成熟、功能更丰富的站点即将上线……<br/>维护时间可能持续一周，请收藏本站网址并在一周后体验更优质的服务！';
			wp_die( $out503 , '网站维护中', array('response' =>'503'));
			       }
	    }
    }
	add_action('get_header', 'wp_site_weihu');

	//walker
	function sti_get_current_page_url() {
	  static $current_url; 	  
	  if ( isset($current_url) )
	    return $current_url;	  
	  $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? true : false;
	  $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
	  $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
	  $port  = $_SERVER['SERVER_PORT'];
	  $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
	  $host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
	  $current_url = $protocol . '://' . $host . $port . $_SERVER['REQUEST_URI'];
	  return $current_url;
	}
	
	/*logo*/
	function zti_mylogo(){
		$url = get_bloginfo('url');
		$name = get_bloginfo('name');
		$desc = get_bloginfo('description');
		if (zti_opt('zti_logo')) {
			$imgurl = zti_opt('zti_logo');
			$mylogo = "<div class='logo'><a href='$url' title='$desc' rel='home'><img alt='logo' src='$imgurl' /></a></div>";
		}else{
			$mylogo = "<div class='site-desc'><a href='$url' rel='home'>$name</a><h2>—— $desc</h2></div>";
		}
		echo $mylogo;
	}

?>