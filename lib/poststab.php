    <div class="row">
        <div class="post-tabs clearfix col-sm-6">
            <ul class="nav nav-tabs" role="tablist">
            	<li role="presentation" class="active">
            		<a href="#tab01" role="tab" data-toggle="tab" aria-controls="tab01">最新</a>
            	</li>
            	<li role="presentation" class="">
            		<a href="#tab02" role="tab" data-toggle="tab" aria-controls="tab02">点赞</a>
            	</li>
            	<li role="presentation" class="">
            		<a href="#tab03" role="tab" data-toggle="tab" aria-controls="tab03">浏览</a>
            	</li>
            	<li role="presentation" class="">
            		<a href="#tab04" role="tab" data-toggle="tab" aria-controls="tab04">热评</a>
            	</li>
            </ul>
            <div class="tab-content">
            	<div role="tabpanel" class="tab-pane fade in active" id="tab01">
            		<ul><?php zti_newposts(6);?></ul>
            	</div>
            	<div role="tabpanel" class="tab-pane fade" id="tab02">
            		<ul><?php zti_mostlike(6);?></ul>
            	</div>
            	<div role="tabpanel" class="tab-pane fade" id="tab03">
            		<ul><?php zti_topviews(6);?></ul>
            	</div>
            	<div role="tabpanel" class="tab-pane fade" id="tab04">
            		<ul><?php zti_mostcomm(6);?></ul>
            	</div>
            </div>
        </div>
        <div class="tab-ad col-sm-6">
            <section class="ad-box">
                <?php if(zti_opt('zti_cms_ad') && zti_opt('zti_cms_adcode')){
                    $adshow = stripslashes(zti_opt('zti_cms_adcode'));
                    echo $adshow;
                } else {
                    echo "欢迎来访！ Enjoy yourself ！";
                }?>
            </section>
        </div>
    </div>