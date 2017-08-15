<?php
/*
   Template Name: tarieven-template
 */


get_header(); ?>

<div id="tarieven">
  <div class="rates-table">
    <?php echo do_shortcode("[my_rates]") ?>
  </div>
  <div class="text-container space-text">
    <?php the_field("tarieven-tekst2") ?>
  </div>
  <div class="rand-container-grey">
    <img src="<?php echo get_template_directory_uri(); ?>/images/rand2.svg" class="breakImg"/>
  </div>
  <div class="grey-body tarieven">
    <h2 class="tarieven">
      <?php the_field("prijs_op_aanvraag-title") ?>
    </h2>
    <div class="text-container">
      <p>
        <?php the_field("prijs_op_aanvraag-text") ?>
      </p>
    </div>
    <button id="wat-doen-wij-button" class="more-info-btn space-btn">    <a href="mailto: info@kidsart.nl">MEER WETEN</a></button>
  </div>
</div>
