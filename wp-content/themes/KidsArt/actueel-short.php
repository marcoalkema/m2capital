<div class="actueel-intro-container">
  <div class="actueel-intro-container-img">
        <img src="<?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 3128;
                      printf(get_field('actueel-header-image', $ID)); }?>" class="headerImg" width="100%" height="500px"/>
  </div>
  <div class="actueel-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 3128;
            printf(get_field('actueel-title', $ID)); }?>
        </h4>
      </div>
    </div>
    <div class="stories_text">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 3128;
        printf(get_field('actueel-text', $ID));
      }?>
    </div>
    <a href="<?php printf(get_site_url() . '/actueel');?>">
      <button class="btn btn-green btn-primary">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 3128;
        printf(get_field('actueel-button-text', $ID));
      }?>
    </button>
    </a>
  </div>
</div>
