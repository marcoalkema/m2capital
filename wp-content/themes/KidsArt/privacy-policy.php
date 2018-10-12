<?php
/*
   Template Name: PRIVACY-TEMPLATE-PAGE
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("privacy-img", get_the_ID()); ?>" class="headerImg"/>
      <div class="page-title-div">
        <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('privacy-title', get_the_ID())); ?></h6>
      </div>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 668 : 1;
                printf(get_field('main_title', $ID));
              }
              ?>
            </h4>
          </div>
        </div>
      </div>

      <div id="title_text-<?php the_ID(); ?>" class="title_text">
        <p>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 668 : 1;
            printf(get_field('main_text', $ID));
          }
          ?>
        </p>
      </div>
    </div>
  </div>
  <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
