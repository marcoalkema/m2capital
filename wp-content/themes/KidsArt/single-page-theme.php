<?php
/*
   Template Name: Single Page Theme Page
 */


get_header(); ?>

<div id="primary" class="site-content">
  <a href="./portfolio">
  <div id="content" role="main">
    <div id="overlay-container" class="overlay">
      <div id="headerSlider" class=”mySlides”>
        <img src="  <?php echo get_field('portfolio-gallery', 17)[10]['sizes']['large']; ?>" class="overlay-image"/>
        <img src="  <?php echo get_field('portfolio-gallery', 17)[11]['sizes']['large']; ?>" class="overlay-image"/>
        <img src="  <?php echo get_field('portfolio-gallery', 17)[12]['sizes']['large']; ?>" class="overlay-image"/>
      </div>
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
  </a>

  <?php get_template_part("intro", "short"); ?>
  <?php get_template_part("wat-doen-wij", "short"); ?>
  <?php get_template_part("band", "short"); ?>
  <?php get_template_part("quotes", "short"); ?>
  <div class="band-container">
  </div>
  <?php get_template_part("onze-visie", "short"); ?>
  <?php get_template_part("contact", "page"); ?>

</div><!-- #primary -->

<?php get_footer(); ?>
