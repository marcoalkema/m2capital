<?php
/*
   Template Name: testimonials-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main-header"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content testimonials-page">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('main_title', get_the_ID())); ?>
            </h4>
          </div>
        </div>
      </div>
      <div id="main-text-<?php the_ID(); ?>" class="main-text">
        <p>
          <?php printf(get_field('main_text', get_the_ID())); ?>
        </p>
      </div>
    </div>
    <?php get_template_part("testimonials", "part"); ?>
    <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
