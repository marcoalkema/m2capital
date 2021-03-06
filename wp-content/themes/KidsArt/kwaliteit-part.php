<?php
/*
   Template Name: kwaliteit-template
 */


get_header(); ?>
<div class="beleidsplan">
  <a target="_blank" href="<?php the_field('beleidsplan-pdf') ?>">
    <button class="more-info-btn btn-pink quality-btn">PEDAGOGISCH BELEIDSPLAN</button>
  </a>
  <a target="_blank" href="<?php the_field('inspectierapport-pdf') ?>">
    <button class="more-info-btn btn-red quality-btn">INSPECTIERAPPORT</button>
  </a>
</div>
<div class="band-container">
  <img src="    <?php the_field("band-container-kwaliteit") ?>"/>
</div>
<div class="onze-visie-title">
  <h2>
    <?php the_field("onze_visie-title") ?>
  </h2>
</div>
<div class="text-container space-text">
  <p>
    <?php the_field("onze_visie-text") ?>
  </p>
</div>
<div class="slider-container">
  <?php
  echo do_shortcode("[metaslider id=491]");
  ?>
</div>
<div class="text-container space-text">
  <p>
    <?php the_field("onze_visie-text2") ?>
  </p>
</div>
