<?php
/*
   Template Name: DISCLAIMER-TEMPLATE-PAGE
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="              <?php
                              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 666 : 1;
                                printf(get_field('header_image', $ID));
                              }
                              ?>" class="headerImg"/>
      <div class="page-title-div">
        <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('disclaimer-title', get_the_ID())); ?></h6>
      </div>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 666 : 1;
                printf(get_field('main_title', $ID));
              }
              ?>
            </h4>
          </div>
        </div>
      </div>

      <div id="title_text-<?php the_ID(); ?>" class="title_text wysiwyg">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 666 : 1;
          printf(get_field('main_text', $ID));
        }
        ?>
      </div>
    </div>
  </div>
</article>
<?php get_template_part("contact", "page"); ?>
<?php get_footer(); ?>
