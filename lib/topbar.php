<div class="header-topbar hidden-xs">
	<div class="container">
		<div class="row">
			<aside class="col-sm-6">
				<?php require_once get_stylesheet_directory() .'/lib/tips.php';?>
			</aside>
			<aside class="col-sm-6">
				<!--这里放社交按钮和登录-->
				<div class="social-btn transition">
					<ul>
						<li>
							<!--登录-->
							<span type="button" class="login-btn" data-toggle="modal" data-target="#login-modal">
							<?php if (!(current_user_can('level_0'))){ echo '<i class="fa fa-lock"></i> 登录';}else{echo '<i class="fa fa-windows"></i> 管理';}?>
							</span>
						</li>
					    <li>
					    	<a href="<?php echo zti_opt('zti_sinaurl') ?>" target="_blank" rel="external nofollow"><i class="fa fa-weibo"></i> 新浪微博</a>
					    </li>
					    <li>
					    	<a href="<?php echo zti_opt('zti_weibourl') ?>" target="_blank" rel="external nofollow" ><i class="fa fa-tencent-weibo"></i> 腾讯微博</a>
					    </li>
					    <li>
					    	<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo zti_opt('zti_qq') ?>&site=qq&menu=yes" target="_blank" rel="external nofollow"><i class="fa fa-qq"></i> 腾讯QQ</a>
					    </li>
					    <li id="weixin">
					    	<a role="button"><i class="fa fa-weixin"></i> 微信</a>
					    	<div class="weixin-qr">
					    		<img src="<?php echo zti_opt('zti_qr')?>" alt="" width="200" height="200"/>
					    		<aside>请打开微信扫描二维码<br/>或搜索<code><?php echo zti_opt('zti_weixin')?></code>关注我们</aside>
					    	</div>
					    </li>
					    <li>
					    	<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i> 订阅我们</a>
					    </li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</div>