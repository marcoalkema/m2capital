<?php
/*
   Template Name: Landing_page
 */


get_header(); ?>

<div class="landing-page">
  <div class="overlay">
    <img src="<?php echo get_template_directory_uri(); ?>/images/overlay.jpg" class="overlay"/>
    <div class="overlay-title">
      <div class="overlay-title-container">
        <h1>Sierra Design</h1>
        <p class="overlay-undertitle">Web design & mobile development</p>
      </div>
    </div>
  </div>
  <?php
  if( get_the_ID() == 5  ||
      get_the_ID() == 7  ||
      get_the_ID() == 9  ||
      get_the_ID() == 13 ||
      get_the_ID() == 15 ||
      get_the_ID() == 19
  ): get_template_part("content", "page");
  endif; ?>
<?php endwhile; endif; ?>
<!-- <div class="landing_page-intro">
     </div>
     <div class="landing_page-what">
     </div>
     <div class="landing_page-quotes">
     </div>
     <div class="landing_page-vision">
     </div>
     <div class="landing_page-contact">
     </div> -->
</div><!-- .content-area -->
<?php get_footer(); ?>
