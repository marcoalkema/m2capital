<?php
/*
   Template Name: Single Page Theme Page
 */


get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div id="overlay-container" class="overlay">
      <?php echo do_shortcode('[metaslider id=176]'); ?>
      <div class="page-title-container">
        <div class="page-title-div">
          <div class="page-title-background"></div>
          <h6 id="landing-overlay-title" class="white landing-title">
            <?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 5 : 1559;
              printf(get_field('header_tagline', $ID));
            }
            ?>
          </h6>
        </div>
      </div>
    </div>
  </div>

  <?php
  get_template_part("introductie", "short");
  get_template_part("gmap_nl", "short");
  get_template_part("aanbod", "short");
  get_template_part("tagline_nl", "short");
  get_template_part("agenda", "short");
  get_template_part("stories_nl", "short");
  get_template_part("contact", "page");
  ?>

</div><!-- #primary -->

<?php get_footer(); ?>
