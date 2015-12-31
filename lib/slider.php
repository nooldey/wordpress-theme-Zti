<section id="top-carousel" class="carousel slide" data-interval="3500" data-ride="carousel">
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <?php /*main image*/
            $img = zti_opt('zti_slide1_img');
            $default = get_bloginfo('template_directory') .'/images/slide.png';
            $imgurl = $img ? $img : $default;
            echo "<img class='slide-img' src='$imgurl' alt='First slide'>";
          ?>
          <div class="carousel-caption hidden-xs">
          <?php /*carousel-caption*/
            $desc = zti_opt('zti_slide1_desc');
            $link = zti_opt('zti_slide1_link');
            $default = '';
            $h3 = "<h3 class='slide-title'>$desc</h3>";
            $button = "<a target='_blank' role='button' href='$link'><span class='btn btn-lg btn-primary'>View More</span></a>";
            $desc_out = $desc ? $h3 : $default;
            echo $desc_out;
            $link_out = $link ? $button : $default;
            echo $link_out;
          ?>
          </div>
        </div>

        <div class="item">
          <?php /*main image*/
            $img = zti_opt('zti_slide2_img');
            $default = get_bloginfo('template_directory') .'/images/slide.png';
            $imgurl = $img ? $img : $default;
            echo "<img class='slide-img' src='$imgurl' alt='Second slide'>";
          ?>
          <div class="carousel-caption hidden-xs">
          <?php /*carousel-caption*/
            $desc = zti_opt('zti_slide2_desc');
            $link = zti_opt('zti_slide2_link');
            $default = '';
            $h3 = "<h3 class='slide-title'>$desc</h3>";
            $button = "<a target='_blank' role='button' href='$link'><span class='btn btn-lg btn-primary'>View More</span></a>";
            $desc_out = $desc ? $h3 : $default;
            echo $desc_out;
            $link_out = $link ? $button : $default;
            echo $link_out;
          ?>
          </div>
        </div>

        <div class="item">
          <?php /*main image*/
            $img = zti_opt('zti_slide3_img');
            $default = get_bloginfo('template_directory') .'/images/slide.png';
            $imgurl = $img ? $img : $default;
            echo "<img class='slide-img' src='$imgurl' alt='Third slide'>";
          ?>
          <div class="carousel-caption hidden-xs">
          <?php /*carousel-caption*/
            $desc = zti_opt('zti_slide3_desc');
            $link = zti_opt('zti_slide3_link');
            $default = '';
            $h3 = "<h3 class='slide-title'>$desc</h3>";
            $button = "<a target='_blank' role='button' href='$link'><span class='btn btn-lg btn-primary'>View More</span></a>";
            $desc_out = $desc ? $h3 : $default;
            echo $desc_out;
            $link_out = $link ? $button : $default;
            echo $link_out;
          ?>
          </div>
        </div>

      </div><!--carousel-inner end-->

      <a class="left carousel-control transition" href="#top-carousel" role="button" data-slide="prev">
        <span class="chevron-left fa fa-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="right carousel-control transition" href="#top-carousel" role="button" data-slide="next">
        <span class="chevron-right fa fa-chevron-right" aria-hidden="true"></span>
      </a>
</section>