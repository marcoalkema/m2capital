<?php

/*
   Template Name: over_ons-template
 */

get_header(); ?>

<div class="template-container grey-body">
  <h2>
    <?php the_field("het_team-title"); ?>
  </h2>
  <div class="text-container space-text">
    <p>
      <?php the_field("het_team-text"); ?>
    </p>
  </div>
  <img src="<?php echo get_template_directory_uri(); ?>/images/rand1.svg" class="breakImg"/>
</div>
<div class="team-dir">
  <div class="team-leden-container">
    <?php echo do_shortcode("[tmm name='kidsart']") ?>
  </div>
  <img src="<?php echo get_template_directory_uri(); ?>/images/rand2.svg" class="breakImg"/>
</div>
<div class="template-container grey-body">
  <h2 id="oudercommisie-h2">
    <?php the_field("oudercommisie-title"); ?>
  </h2>
  <div class="text-container space-text">
    <p>
      <?php the_field("oudercommisie-text"); ?>
    </p>
  </div>
</div>
<div class="template-container">
  <h2 class="stagiaires-title font-pink">
    <?php the_field("stagiaires-title"); ?>
  </h2>
  <div class="text-container space-text">
    <p>
      <?php the_field("stagiaires-text"); ?>
    </p>
  </div>
</div>
