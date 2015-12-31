<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'ZTI';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

/******初始化变量*****/
	//将所有分类放置到数组中
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	//将所有标签放置到数组中
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	//将所有页面放置到数组中
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = '点击选择一个页面';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

/******开始设置主题选项内容*******/
    // If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
/***基本设置***/

	$options[] = array(
		'name' => __( '基本设置', 'ZTI' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( '关键词KeyWords', 'ZTI' ),
		'placeholder' => __( '输入网站的关键词，用英文逗号隔开', 'ZTI' ),
		'id' => 'zti_keyword',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '描述Description', 'ZTI' ),
		'placeholder' => __( '输入你的网站描述，一般不超过200个字符', 'ZTI' ),
		'id' => 'zti_description',
		'std' => '',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'SEO分隔符', 'ZTI' ),
		'placeholder' => __( '设定网站title分隔符号，用于SEO优化', 'ZTI' ),
		'id' => 'zti_cnc',
		'std' => '_',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '建站日期', 'ZTI' ),
		'placeholder' => __( '这将帮助系统获取网站运营的天数', 'ZTI' ),
		'id' => 'zti_sitedate',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '新浪微博', 'ZTI' ),
		'placeholder' => __( '输入新浪微博地址', 'ZTI' ),
		'id' => 'zti_sinaurl',
		'std' => 'http://weibo.com/nooldey',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '腾讯微博', 'ZTI' ),
		'placeholder' => __( '输入腾讯微博地址', 'ZTI' ),
		'id' => 'zti_weibourl',
		'std' => 'http://t.qq.com/nooldey',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '联系QQ', 'ZTI' ),
		'placeholder' => __( '输入QQ号码', 'ZTI' ),
		'id' => 'zti_qq',
		'std' => '12345678',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '微信账号', 'ZTI' ),
		'placeholder' => __( '输入微信昵称', 'ZTI' ),
		'id' => 'zti_weixin',
		'std' => '主题IIII',
		'type' => 'text'
	);

	$options[] = array(
		'desc' => __('微信二维码，建议图片尺寸：200x200px', 'ZTI'),
		'id' => 'zti_qr',
		'std' => '',
		'type' => 'upload'
	);
	
	$options[] = array(
		'name' => __('网站LOGO'),
		'desc' => __('请上传您的网站logo', 'ZTI'),
		'id' => 'zti_logo',
		'std' => '',
		'type' => 'upload'
	);

	$options[] = array(
    		'name' => __('网站公告','ZTI'),
    		'desc' => __('显示网站公告','ZTI'),
    		'id' => 'zti_tip',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('示例：<li>单条公告内容</li>（建议字数在50字以内）','ZTI'),
    		'id' => 'zti_tip_text',
    		'std' => '',
    		'type' => 'textarea'
    	);

    	$options[] = array(
    		'name' => __('登录界面文字','ZTI'),
    		'placeholder' => __('此处内容将显示在登陆界面','ZTI'),
    		'id' => 'zti_message_text',
    		'std' => '',
    		'type' => 'textarea'
    	);

    	$options[] = array(
    		'name' => __('资源下载说明文字','ZTI'),
    		'placeholder' => __('此处内容将显示在主题介绍正文','ZTI'),
    		'id' => 'zti_download_notice',
    		'std' => '',
    		'type' => 'textarea'
    	);

   	$options[] = array(
    		'name' => __('网站统计','ZTI'),
    		'desc' => __('开启访问统计','ZTI'),
    		'id' => 'zti_tj',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('请输入网站统计代码','ZTI'),
    		'id' => 'zti_tjcode',
    		'std' => '',
    		'type' => 'textarea'
    	);

   	$options[] = array(
    		'name' => __('底部边栏','ZTI'),
    		'desc' => __('显示底部四格边栏','ZTI'),
    		'id' => 'zti_footbar',
    		'std' => 'true',
    		'type' => 'checkbox'
    	);



/***首页幻灯片设置***/

	$options[] = array(
		'name' => __( '幻灯片', 'ZTI' ),
		'type' => 'heading'
	);
   	
   	$options[] = array(
    		'desc' => __('是否开启幻灯片','ZTI'),
    		'id' => 'zti_slide_sw',
    		'std' => '',
    		'type' => 'checkbox'
    	);

	$options[] = array(
		'name' => __('首页幻灯片1 设置','ZTI'),
		'desc' => __('上传大图(必填，可直接粘贴图片链接地址)', 'ZTI'),
		'id' => 'zti_slide1_img',
		'std' => '',
		'type' => 'upload'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片1 文字描述，建议在50字以内', 'ZTI' ),
		'id' => 'zti_slide1_desc',
		'std' => '',
		'type' => 'textarea'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片1 链接，输入链接地址', 'ZTI' ),
		'id' => 'zti_slide1_link',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('首页幻灯片2 设置','ZTI'),
		'desc' => __('上传大图(必填，可直接粘贴图片链接地址)', 'ZTI'),
		'id' => 'zti_slide2_img',
		'std' => '',
		'type' => 'upload'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片2 文字描述，建议在50字以内', 'ZTI' ),
		'id' => 'zti_slide2_desc',
		'std' => '',
		'type' => 'textarea'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片2 链接，输入链接地址', 'ZTI' ),
		'id' => 'zti_slide2_link',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __('首页幻灯片3设置','ZTI'),
		'desc' => __('上传大图(必填，可直接粘贴图片链接地址)', 'ZTI'),
		'id' => 'zti_slide3_img',
		'std' => '',
		'type' => 'upload'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片3 文字描述，建议在50字以内', 'ZTI' ),
		'id' => 'zti_slide3_desc',
		'std' => '',
		'type' => 'textarea'
	);
	$options[] = array(
		'placeholder' => __( '首页幻灯片3 链接，输入链接地址', 'ZTI' ),
		'id' => 'zti_slide3_link',
		'std' => '',
		'type' => 'text'
	);	

/***首页设置***/

	$options[] = array(
		'name' => __( '布局设置', 'ZTI' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __('首页布局排版', 'ZTI'),
		'id' => 'zti_index_form',
		'std' => "cms",
		'type' => "radio",
		'options' => array(
			'blog' => __('普通博客视图', 'ZTI'),
			'cms' => __('门户CMS视图', 'ZTI'),
			'company' => __('企业服务视图', 'ZTI')
		));
	


    if ( $options_categories ) {
		$options[] = array(
			'name' => __( '企业首页文章分类', 'ZTI' ),
			'desc' => __( '选择图文列表文章的分类', 'ZTI' ),
			'id' => 'zti_com_cat1',
			'type' => 'select',
			'options' => $options_categories
		);
	
		$options[] = array(
			'desc' => __( '企业首页横屏图文分类', 'ZTI' ),
			'id' => 'zti_com_cat2',
			'type' => 'select',
			'options' => $options_categories
		);
	}
    
	$options[] = array(
			'name' => __( '选择CMS分类', 'ZTI' ),
			'desc' => __( '输入首页CMS模块调用的分类id，每个ID用英文逗号隔开', 'ZTI' ),
			'id' => 'zti_cms_cat',
			'std' => '',
			'type' => 'text',
		);

	$options[] = array(
		'name' => __( '选择主题模板分类', 'ZTI' ),
		'desc' => __( '输入发布主题模板的分类id', 'ZTI' ),
		'id' => 'zti_theme_cat',
		'std' => '',
		'type' => 'text',
	);

/***网站优化***/

	$options[] = array(
		'name' => __( '网站优化', 'ZTI' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'jQuery库托管（可优化加载速度）', 'ZTI' ),
		'id' => 'zti_js',
		'type' => 'radio',
		'std' => 'baidu',
		'options' => array(
			'code' => __( 'jQuery官方库', 'ZTI' ),
			'msdn' => __( '微软msdn托管', 'ZTI' ),
			'360' => __( '360托管', 'ZTI' ),
			'baidu' => __( '百度托管', 'ZTI' ),
			'self' => __( '不托管（使用主题内置jQuery文件）', 'ZTI' )
			)
	);

	$options[] = array(
		'name' => __('Gravatar 头像获取源', 'ZTI'),
		'id' => 'zti_gra',
		'std' => "duoshuo",
		'type' => "radio",
		'options' => array(
			'none' => __('使用默认头像源', 'ZTI'),
			'ssl' => __('从Gravatar官方ssl获取', 'ZTI'),
			'duoshuo' => __('从多说服务器获取', 'ZTI')
		));

	$options[] = array(
		'name' => __( '缩略图', 'ZTI' ),
		'desc' => __( '显示文章列表缩略图', 'ZTI' ),
		'id' => 'zti_thumb',
		'std' => 'false',
		'type' => 'checkbox'
	);

   	$options[] = array(
    		'name' => __('维护模式','ZTI'),
    		'desc' => __('开启网站维护模式，您的网站将无法被访问并提示网站维护','ZTI'),
    		'id' => 'zti_weihu',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);
 
/***广告位***/
	$options[] = array(
		'name' => __( '广告位', 'ZTI' ),
		'type' => 'heading'
	);

   	$options[] = array(
    		'name' => __('CMS首页广告','ZTI'),
    		'desc' => __('开启CMS首页广告','ZTI'),
    		'id' => 'zti_cms_ad',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('请输入CMS首页tab广告代码，支持javascript/html/text','ZTI'),
    		'id' => 'zti_cms_adcode',
    		'std' => '',
    		'type' => 'textarea'
    	);

   	$options[] = array(
    		'name' => __('侧边栏广告','ZTI'),
    		'desc' => __('开启侧边栏默认广告','ZTI'),
    		'id' => 'zti_side_ad',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('输入侧边栏默认广告代码，支持javascript/html/text','ZTI'),
    		'id' => 'zti_side_adcode',
    		'std' => '',
    		'type' => 'textarea'
    	);

   	$options[] = array(
   			'name' => __('主题正文广告'),
    		'placeholder' => __('输入主机广告链接','ZTI'),
    		'id' => 'zti_theme_adlink',
    		'std' => 'http://ztiiii.com/',
    		'type' => 'text'
    	);

   	$options[] = array(
    		'name' => __('下载页广告','ZTI'),
    		'desc' => __('开启下载页广告','ZTI'),
    		'id' => 'zti_list_ad',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('请输入下载页广告代码，支持javascript/html/纯文字','ZTI'),
    		'id' => 'zti_list_adcode',
    		'std' => '',
    		'type' => 'textarea'
    	);

   	$options[] = array(
    		'name' => __('移动端广告','ZTI'),
    		'desc' => __('开启移动端广告','ZTI'),
    		'id' => 'zti_wap_ad',
    		'std' => 'false',
    		'type' => 'checkbox'
    	);

   	$options[] = array(
    		'placeholder' => __('请输入移动端广告代码，支持javascript/html/纯文字','ZTI'),
    		'id' => 'zti_wap_adcode',
    		'std' => '',
    		'type' => 'textarea'
    	);


/***会员中心***/

	$options[] = array(
		'name' => __( '会员中心', 'ZTI' ),
		'type' => 'heading'
	);

	return $options;
}