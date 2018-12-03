<div class="actueel-intro-container-img">
<img src="      <?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 3187;
                  printf(get_field('asset-management-img', $ID));
                }
                ?>" class="headerImg"/>
</div>
<div id="asset-management__" class="h4_block">
  <div class="h4_container">
    <h4 class="green underlineGreen">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 3187;
        printf(get_field('asset-management-title', $ID));
      }
      ?>
    </h4>
  </div>
</div>

<div class="asset-management-text-block">
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 3187;
      printf(get_field('asset-management-text1', $ID));
    }
    ?>

  <?php echo do_shortcode("[metaslider id=2072]");?>

  <div class="wysiwyg">
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 3187;
      printf(get_field('asset-management-text2', $ID));
    }
    ?>
  </div>
  <a href="<?php printf(get_site_url()) ?>/projecten/">
      <button class="btn btn-green btn-primary">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 3187;
        printf(get_field('asset-management-button-text', $ID));
      }
      ?>
    </button>
  </a>
</div>
