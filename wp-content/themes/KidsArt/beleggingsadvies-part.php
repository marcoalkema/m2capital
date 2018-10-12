<div class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
        printf(get_field('beleggingsadvies-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="beleggingsadvies-text-block">
  <p>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
      printf(get_field('beleggingsadvies-text1', $ID));
    }
    ?>
  </p>

  <?php echo do_shortcode("[metaslider id=2095]"); ?>

  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
          printf(get_field('beleggingsadvies-text2', $ID));
      }
      ?>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper tekstlinks">
                  <?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
                      printf(get_field('beleggingsadvies-header-tekst', $ID));
                  }
                  ?>
              </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
              <div class="wrapper">
                  <img src="<?php
                            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
                                printf(get_field('beleggingsadvies-foto', $ID));
                            }
                            ?>" class="asset-management-foto" />
              </div>
          </div>
      </div>
  </div>
  <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
          printf(get_field('beleggingsadvies-text3', $ID));
      }
      ?>
  </div>

  <a href="<?php printf(get_site_url()) ?>/beleggingsadvies_/">
      <button>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
              printf(get_field('beleggingsadvies-button-text', $ID));
          }
          ?>
  </button>
  </a>
</div>
