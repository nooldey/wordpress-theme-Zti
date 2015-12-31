<?php 
		/*后台个人资料添加alipay项*/
	function zti_profile($contactmethods){
		$contactmethods['alipay'] = '支付宝二维码地址';//后期扩展其他资料；
		$contactmethods['wxpay'] = '微信收款二维码地址';
		return $contactmethods;
	}
	add_filter('user_contactmethods','zti_profile',10,1);

	/*alipay_link*/
	function the_author_alipay(){
		$alipay = get_the_author_meta("alipay");
		$default = alipayimg();
		$out = $alipay ? $alipay : $default;
		return $out;
	}
	/*weixinpay_link*/
	function the_author_wxpay(){
		$wxpay = get_the_author_meta("wxpay");
		$default = wxpayimg();
		$out = $wxpay ? $wxpay : $default;
		return $out;
	}
	/*用户信息*/
	function zti_usr_meta($key){
		global $current_user;
          get_currentuserinfo();
          $usr_meta = array(
          	'name' => $current_user->user_login, 
          	'email' => $current_user->user_email,
          	'credit' => $current_user->user_credit
          );
          $emp = '';
          $out_meta = $key ? $usr_meta[$key] : $emp;
          return $out_meta;
	}
?>