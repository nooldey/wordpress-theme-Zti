<section id="top-carousel" class="carousel slide" data-interval="3500" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
<?php
  $i = 0;
  while ( $i<= 2) {
    /*修改2可显示X+1张幻灯片*/
    $i++;
    if ($i == 1) {
      $item .= "<div class='item active'>";
    }else{
      $item .= "<div class='item'>";
    }
    /*main image*/
      $key = 'zti_slide'.$i;
      $img = zti_opt($key.'_img');
      $default_img = get_bloginfo('template_directory') .'/images/slide.png';
      $imgurl = $img ? $img : $default_img;
      $item .= "<img class='slide-img' src='$imgurl' alt='slideimg'>";
      $item .= "<div class='carousel-caption hidden-xs'>";
    /*carousel-caption*/
      $desc = zti_opt($key.'_desc');
      $link = zti_opt($key.'_link');
      $default = '';
      $h3 = "<h3 class='slide-title'>".$desc."</h3>";
      $button = "<a target='_blank' role='button' href='".$link."'><span class='btn btn-lg btn-primary'>View More</span></a>";
      $item .= $desc ? $h3 : $default;
      $item .= $link ? $button : $default;
      $item .= "</div></div>";
  }
  echo $item;
?>
      </div><!--carousel-inner end-->

      <a class="left carousel-control transition" href="#top-carousel" role="button" data-slide="prev">
        <span class="chevron-left fa fa-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="right carousel-control transition" href="#top-carousel" role="button" data-slide="next">
        <span class="chevron-right fa fa-chevron-right" aria-hidden="true"></span>
      </a>
</section>