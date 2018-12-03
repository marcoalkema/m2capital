<?php
/*
   Template Name: Home Template
 */

get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div id="overlay-container" class="overlay">
      <?php echo do_shortcode('[metaslider id=176]'); ?>
        <div class="page-title-container">
            <img src="<?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 5 : 3121;
                printf(get_field('header_overlay_image', $ID));
            }
            ?>" class="overlay-plaatje"/>
        <div class="page-title-div">
            <h6 id="landing-overlay-title" class="white landing-	title">
                <?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 5 : 3121;
                    printf(get_field('header_tagline', $ID));
                }
                ?>
                <a rel="m_PageScroll2id" href="#welkom-bij-m2"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a><br>
          </h6>
        </div>
      </div>
    </div>
  </div>

  <?php
  get_template_part("introductie", "short");
  get_template_part("wat-doen-wij", "short");
  get_template_part("actueel", "short");
  get_template_part("contact", "page");
  ?>

</div><!-- #primary -->

<?php get_footer(); ?>
