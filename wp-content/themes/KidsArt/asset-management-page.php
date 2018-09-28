<?php
/*
   Template Name: PROJECT TEMPLATE
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("header-img"); ?>" class="headerImg"/>
      <h6><?php the_field("header-img-title"); ?></h6>
    </div>
    <div class="template-page-content network-page">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">

        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
	      <?php
	      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	        printf(get_field('main-title', get_the_ID()));
	      };
	      ?></h4>
          </div>
        </div>
        <p>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            printf(get_field('main-text', get_the_ID()));
          };
          ?>
        </p>
      </div>
    </div>

    <div>
      <?php get_template_part("project", "part"); ?>
    </div>

  </div>
  <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
