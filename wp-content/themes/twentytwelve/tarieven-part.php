<?php
/*
   Template Name: tarieven-template
 */


get_header(); ?>

<div id="tarieven">
  <div class="rates-table">
    <?php echo do_shortcode("[my_rates]") ?>
  </div>
  <img src="<?php echo get_template_directory_uri(); ?>/images/rand2.png" class="breakImg"/>
  <div class="grey-body tarieven">
    <h2 class="tarieven">
      <?php the_field("prijs_op_aanvraag-title") ?>
    </h2>
    <div class="text-container">
      <p>
        <?php the_field("prijs_op_aanvraag-text") ?>
      </p>
    </div>
    <button class="more-info-btn">MEER WETEN</button>
  </div>
</div>
