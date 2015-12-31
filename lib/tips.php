		<?php if(zti_opt('zti_tip')){?>
			<section class="toptip">
				<aside class="tips">
					<span><i class="fa fa-volume-up"></i></span>
					<ul>
					<?php $toptip = zti_opt('zti_tip_text');
						  if($toptip){
						  	echo $toptip;
						  } else {
						  	$output = bloginfo('description');
						  	echo $output;
						  }
					?>
					</ul>
				</aside>				
			</section>
		<?php }else{ echo ''; }?>