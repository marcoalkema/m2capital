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

  <button>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 911 : 1;
      printf(get_field('herontwikkel-button-text', $ID));
    }
    ?>
  </button>
</div>

<div class="interest-in-project">
  <div class="h4_block">
    <div class="h4_container">
      <h4 class="green underlineGreen">
        <?php printf(get_field('wie-zijn-wij-title123123', get_the_ID())); ?>
        Geinteresseerd in dit project?
      </h4>
    </div>
  </div>
  <p>
    Neem dan contact op met ons via de onderstaande knop!
  </p>
  <a href="#contact">
    <button class="btn btn-green">Contact</button>
  </a>
</div>
