<?php
/*
   Template Name: general_content-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("header_image"); ?>" class="headerImg"/>
      <!-- <div class="page-title-container">
           <div class="page-title-div">
           <div class="page-title-background"></div>
           <h1 id="page-title-<?php the_ID(); ?>" class="template-page-title"><?php printf(get_field('main-title', get_the_ID())); ?></h1>
           </div>
           </div> -->
    </div>
    <div class="template-page-content general-content">
      <div -<?php the_ID(); ?>" class="main-text">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('main_title', get_the_ID())); ?>
            </h4>
          </div>
        </div>
        <p>
          <?php printf(get_field('main_text', get_the_ID())); ?>
        </p>
      </div>
    </div>
    <?php get_template_part("contact", "page"); ?>
  </div>
</article>

<?php get_footer(); ?>
