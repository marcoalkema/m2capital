<div class="tagline-intro-container">
  <div class="tagline-intro">
    <div class="large-tagline">
      <img src="<?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 895 : 1486;
                  the_field("tagline_image", $ID);
                }
                ?>">
      <!-- <div class="large-tagline-mask"></div> -->
      <div class="long_tagline">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 895 : 1486;
          printf(get_field('long_tagline', $ID));
        }?>
      </div>
      <p class="long_tagline_undertitle">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 895 : 1486;
          printf(get_field('short_tagline', $ID )); }
        ?>
      </p>
    </div>
  </div>
</div>
