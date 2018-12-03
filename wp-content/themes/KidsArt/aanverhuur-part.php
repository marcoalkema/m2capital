<div class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 3196;
        printf(get_field('aanverhuur-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="aan-verhuur-text-block">
  <?php
  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 3196;
    printf(get_field('aanverhuur-text1', $ID));
  }
  ?>

  <?php echo do_shortcode("[metaslider id=2107]"); ?>

  <div class="wysiwyg">
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 3196;
      printf(get_field('aanverhuur-text2', $ID));
    }
    ?>
  </div>

  <a href="<?php printf(get_site_url()) ?>/aan-verhuur/">
    <button class="btn btn-green btn-primary">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 2097 : 3196;
        printf(get_field('aanverhuur-button-text', $ID));
      }
      ?>
    </button>
  </a>
</div>
