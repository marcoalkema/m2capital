<?php
/*
   Template Name: voorwaarden-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
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
    <div id="contact" class="contact-form-small contact_form-<?php the_ID(); ?>">
      <div class="contact-title-container">
        <div id="contact-title-<?php the_ID(); ?>" class="contact-title">
          <h3>CONTACT OPNEMEN</h3>
        </div>
      </div>
      <div class="contact-form-small-container">
        <?php echo do_shortcode( '[contact-form-7 id="285" title="Contact - Compact" html_id=the_ID()]' ); ?>
      </div>
    </div>
  </div>
</article>

<?php get_footer(); ?>
