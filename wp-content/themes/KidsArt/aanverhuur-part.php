<div class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
        printf(get_field('aanverhuur-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="aan-verhuur-text-block">
  <p>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
      printf(get_field('aanverhuur-text1', $ID));
    }
    ?>
  </p>

  <?php echo do_shortcode("[metaslider id=2107]"); ?>

  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
          printf(get_field('aanverhuur-text2', $ID));
      }
      ?>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper">

                  <img src="<?php
                            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
                                printf(get_field('aanverhuur-foto', $ID));
                            }
                            ?>" class="asset-management-foto" />
              </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper tekstrechts">
                  <?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
                      printf(get_field('aanverhuur-header-tekst', $ID));
                  }
                  ?>
              </div>
          </div>
      </div>
  </div>
  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
          printf(get_field('aanverhuur-text3', $ID));
      }
      ?>
  </div>

  <a href="<?php printf(get_site_url()) ?>/aan-verhuur_/">
      <button>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
              printf(get_field('aanverhuur-button-text', $ID));
          }
          ?>
      </button>
  </a>
</div>
