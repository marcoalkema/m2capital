<?php
/*
   Template Name: kwaliteit-template
 */


get_header(); ?>

<div class="band-container">
  <img src="<?php echo get_template_directory_uri(); ?>/images/band.png" class="overlay"/>
</div>
<div class="onze-visie-title">
  <h2>
    <?php the_field("onze_visie-title") ?>
  </h2>
</div>
<div class="text-container">
  <p>
    <?php the_field("onze_visie-text") ?>
  </p>
</div>
<div class="slider-container">
  <?php
  echo do_shortcode("[metaslider id=176]");
  ?>
</div>
<div class="text-container">
  <p>
    <?php the_field("onze_visie-text2") ?>
  </p>
</div>
