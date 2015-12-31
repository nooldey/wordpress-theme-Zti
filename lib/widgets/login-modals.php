<?php
/*
** 
*/
?>
<!--登录弹框窗口-->
<div class="modal fade login-modal" id="login-modal" tabindex="-1" aria-hidden="true" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

<?php if (!(current_user_can('level_0'))){ ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        <h4><i class="fa fa-motorcycle"></i>快速登录</h4>
      </div>
        <form id="login" class="form-horizontal" action="<?php echo get_option('home'); ?>/wp-login.php" method="post" novalidate="novalidate">
      <div class="modal-body">
        		<p>
              <labe for="username" class="control-label">账号</label>
        			<input class="input-control form-control" id="logo" type="text" placeholder="请输入用户名" name="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" required="" aria-required="true">
        		</p>
            <p>
              <labe for="password" class="control-label">密码</label>
        		  <input class="input-control form-control" id="pwd" type="password" placeholder="请输入密码" name="pwd" required="" aria-required="true">
        		</p>
            <p>
              <label class="remembermetext" for="rememberme">
        		 	  <input name="rememberme" type="checkbox" id="rememberme" class="rememberme" value="forever">记住我的登录
        		  </label>
        		</p>
      </div>
      <div class="modal-footer">
            <p>
              <button class="submit btn btn-sm btn-default" ><i class="fa fa-sign-in"></i><input type="submit" name="submit" value="登录" /></button>
              <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" /> 
            </p>
      </div>
		    </form>

<?php } else { ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        <h4><i class="fa fa-bicycle"></i>你已成功登录！</h4>
      </div>
      <div class="modal-body">
        <p>当前登录用户：<?php echo zti_usr_meta('name');?></p>
        <p>联系邮箱: <?php echo zti_usr_meta('email');?></p>
        <p>你的积分：<?php echo zti_usr_meta('credit');?></p>
        <p><a href="#ucenter" class="btn btn-sm btn-default">进入用户中心</a></p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title=""><span class="btn btn-sm btn-default"><i class="fa fa-sign-out"></i> 退出登录</span></a>
      </div>
<?php }?>
      
    </div>
  </div>
</div>
