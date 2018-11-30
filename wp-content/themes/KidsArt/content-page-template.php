<?php
/*
   Template Name: page-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main-header"); ?>" class="headerImg"/>
      <div class="page-title-container">
        <div class="page-title-div aanbod-title-div">
          <div class="page-title-background"></div>
          <h6 id="landing-overlay-title" class="white landing-title"><?php the_field('main-title'); ?></h6>
        </div>
      </div>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php the_field('text_title'); ?>
            </h4>
          </div>
        </div>
      </div>

      <div id="title_text-<?php the_ID(); ?>" class="title_text">
        <p>
          <?php printf(get_field('text_content', get_the_ID())); ?>
        </p>
      </div>

      <div id="large-tagline-<?php the_ID(); ?>" class="large-tagline">
        <img src="<?php the_field("tagline_background"); ?>"/>
        <div class="long_tagline">
          <?php printf(get_field('long_tagline', get_the_ID())); ?>
        </div>
        <div class="long_tagline_undertitle">
          <?php printf(get_field('long_tagline_undertitle', get_the_ID())); ?>
        </div>
      </div>

      <div id="main-text-<?php the_ID(); ?>" class="main-text">
        <p>
          <?php printf(get_field('main_text', get_the_ID())); ?>
        </p>
      </div>

      <?php
      $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
      $the_query = new WP_Query($args);
      ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</article>

<?php get_footer(); ?>
