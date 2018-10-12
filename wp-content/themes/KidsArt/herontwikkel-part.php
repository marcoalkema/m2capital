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
