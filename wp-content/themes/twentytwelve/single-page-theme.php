<?php
/*
   Template Name: Single Page Theme Page
 */


get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div class="overlay">
      <img src="<?php echo get_template_directory_uri(); ?>/images/overlay.jpg" class="overlay"/>
      <div class="overlay-title">
        <div class="overlay-title-container">
          <h1 id="landing-overlay-title">ART IS FUN</h1>
        </div>
      </div>
    </div>
  </div>

  <?php get_template_part("intro", "short"); ?>
  <?php get_template_part("wat-doen-wij", "short"); ?>
  <?php get_template_part("band", "short"); ?>
  <?php get_template_part("quotes", "short"); ?>
  <div class="band-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/band.png" class="overlay"/>
  </div>
  <?php get_template_part("onze-visie", "short"); ?>
  <?php get_template_part("contact", "page"); ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
