<div class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
        printf(get_field('herontwikkel-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="her-ontwikkel-text-block">
  <p>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
      printf(get_field('herontwikkel-text1', $ID));
    }
    ?>
  </p>

  <?php echo do_shortcode("[metaslider id=2083]"); ?>

  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
          printf(get_field('herontwikkel-text2', $ID));
      }
      ?>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper">

                  <img src="<?php
                            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
                                printf(get_field('herontwikkel-foto', $ID));
                            }
                            ?>" class="asset-management-foto" />
              </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper tekstrechts">
                  <?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
                      printf(get_field('herontwikkel-header-tekst', $ID));
                  }
                  ?>
              </div>
          </div>
      </div>
  </div>
  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
          printf(get_field('herontwikkel-text3', $ID));
      }
      ?>
  </div>
  <a href="<?php printf(get_site_url()) ?>/herontwikkeling_/">
      <button>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
              printf(get_field('herontwikkel-button-text', $ID));
          }
          ?>
  </button>
  </a>
</div>
