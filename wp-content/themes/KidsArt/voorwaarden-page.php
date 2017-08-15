<?php
/*
   Template Name: voorwaarden-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main-header"); ?>" class="headerImg"/>
      <div class="page-title-container">
        <h1 id="page-title-<?php the_ID(); ?>" class="template-page-title"><?php printf(get_field('main-subtitle', get_the_ID())); ?></h1>
      </div>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <h2>
          <?php printf(get_field('main-title', get_the_ID())); ?>
        </h2>
      </div>
      <div class="main-text space-text">
        <p>
          <?php printf(get_field('main-text', get_the_ID())); ?>
        </p>
      </div>
    </div>
    <?php get_template_part("contact", "page"); ?>
  </div>
</article>

<?php get_footer(); ?>
