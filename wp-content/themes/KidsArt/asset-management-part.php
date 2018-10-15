<div class="actueel-intro-container-img">
<img src="      <?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
                  printf(get_field('asset-management-img', $ID));
                }
                ?>" class="headerImg"/>
</div>
<div id="asset-management__" class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
        printf(get_field('asset-management-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="asset-management-text-block">
  <p>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
      printf(get_field('asset-management-text1', $ID));
    }
    ?>
  </p>

  <?php echo do_shortcode("[metaslider id=2072]");?>

  <div>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
      printf(get_field('asset-management-text2', $ID));
    }
    ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="wrapper tekstlinks">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
            printf(get_field('asset-management-header_tekst', $ID));
          }
          ?>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="wrapper">
          <img src="<?php
                    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
                      printf(get_field('asset-management-foto_project', $ID));
                    }
                    ?>" class="asset-management-foto" />
        </div>
      </div>
    </div>
  </div>
  <div>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
      printf(get_field('asset-management-text3', $ID));
    }
    ?>
  </div>

  <a href="<?php printf(get_site_url()) ?>/asset-management/">
    <button>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
        printf(get_field('asset-management-button-text', $ID));
      }
      ?>
    </button>
  </a>
</div>
