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
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
      printf(get_field('beleggingsadvies-text1', $ID));
    }
    ?>

  <?php echo do_shortcode("[metaslider id=2095]"); ?>

  <div class="wysiwyg">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1092 : 1;
          printf(get_field('beleggingsadvies-text2', $ID));
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
