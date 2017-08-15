<?php
/*
   Template Name: netwerk-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main-header"); ?>" class="headerImg"/>
      <div class="page-title-container">
        <h1 id="page-title-<?php the_ID(); ?>" class="template-page-title font-red"><?php printf(get_field('main-subtitle', get_the_ID())); ?></h1>
      </div>
    </div>
    <div class="template-page-content grey-body">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <h2>
          <?php printf(get_field('main-title', get_the_ID())); ?>
        </h2>
      </div>
      <div id="main-text-<?php the_ID(); ?>" class="main-text space-text">
        <p>
          <?php printf(get_field('main-text', get_the_ID())); ?>
        </p>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/images/rand1.svg"/>
    </div>
    <?php get_template_part("ons-netwerk", "part"); ?>
    <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
