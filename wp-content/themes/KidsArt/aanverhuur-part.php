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

  <button>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 1;
      printf(get_field('aanverhuur-button-text', $ID));
    }
    ?>
  </button>
</div>
