<?php
/*
   Template Name: Actueel Template
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("actueel-img"); ?>" class="headerImg"/>
      <div class="page-title-div">
        <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('main-title', get_the_ID())); ?></h6>
      </div>
    </div>
    <div class="template-page-content actueel-page">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">

        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
	      <?php
	      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1939 : 3295;
	        printf(get_field('actueel-title', $ID));
	      };
	      ?></h4>
          </div>
        </div>
      </div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1939 : 3295;
        printf(get_field('actueel-text', $ID));
      };
      ?>
    </div>

    <div>
      <?php get_template_part("actueel", "part"); ?>
    </div>

  </div>
  <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
