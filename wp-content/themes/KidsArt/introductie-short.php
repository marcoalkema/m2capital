<div class="introduction-container">
  <div class="h4_block">
    <div class="h4_container">
      <h4 class="green underlineGreen">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 7 : 1464;
          printf(get_field('intro_title', $ID));
        };
        ?></h4>
    </div>
  </div>
  <p>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 7 : 1464;
      printf(get_field('intro_text', $ID));
    };
    ?>
  </p>
</div>
