<?php if(is_single()){ ?>
<div class="modal fade alipay-modal" id="alipay-modal" tabindex="-1" aria-hidden="true" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md">
    <div class="modal-content" id="alipay" >
    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
    		<h4>打赏作者</h4>
    	</div>
    	<div class="modal-body">
    		<p>
    			感谢您对<u>主题站</u>作者<b><?php the_author(); ?></b>的支持，打赏作者属于自愿行为，一经支付，除非被打赏人退回，否则款项无法退回。
    		</p>
            <div class="payment">
                <img src="<?php echo the_author_alipay();?>" alt="alipayqr" title="用支付宝手机钱包扫一扫打赏"/>
                <aside class="paymiddle hidden-xs">
                    <span><i class="fa fa-hand-o-left"></i>用支付宝扫描打赏</span>
                    <span>用微信扫一扫打赏<i class="fa fa-hand-o-right"></i></span>
                </aside>
                <img src="<?php echo the_author_wxpay();?>" alt="weixinqr" title="用微信扫一扫打赏"/>
            </div>
    		<p>
    			（请共同支持无私分享精品主题的程序猿/媛们，让更多精美的主题得到良好的成长，让更多的站长可以用上高性价比甚至是免费的WordPress主题以及各类精美网站模板！）
    		</p>
    	</div>
    	<div class="modal-footer">
			——向伏案耕耘的程序猿/媛、射鸡狮、产品经理们致敬！
    	</div>
        
    </div>
  </div>
</div>
<?php }else{return;}?>