
<img src="      <?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
                  printf(get_field('asset-management-img', $ID));
                }
                ?>" class="headerImg"/>
<div class="h4_block">
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

  <button>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 913 : 1;
      printf(get_field('asset-management-button-text', $ID));
    }
    ?>
  </button>
</div>
