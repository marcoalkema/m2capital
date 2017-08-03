<?php
/*
   Template Name: Single Page Theme Page
 */


get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div id="overlay-container" class="overlay">
      <a href="/portfolio">
        <img src="<?php echo the_field("overlay-image", 5); ?>" class="overlay-image"/>
      </a>
        <div class="overlay-title">
          <div class="overlay-title-container">
            <h1 id="landing-overlay-title" class="font-pink">ART IS FUN</h1>
          </div>
        </div>
        <div id="overlay-arrow" class="overlay-arrow-container">
          <div class="arrow">
            <a href="#intro-content" data-ps2id="true" class="ps2id">
              <img src="<?php echo get_template_directory_uri(); ?>/images/white-down-arrow.png" class="landing-overlay-arrow"/>
            </a>
          </div>
        </div>
      </div>
  </div>

  <?php get_template_part("intro", "short"); ?>
  <?php get_template_part("wat-doen-wij", "short"); ?>
  <?php get_template_part("band", "short"); ?>
  <?php get_template_part("quotes", "short"); ?>
  <div class="band-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/band.png" class="band"/>
  </div>
  <?php get_template_part("onze-visie", "short"); ?>
  <?php get_template_part("contact", "page"); ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
