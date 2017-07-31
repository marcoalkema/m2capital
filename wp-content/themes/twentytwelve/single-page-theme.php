<?php
/*
   Template Name: Single Page Theme Page
 */


get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <div class="overlay">
      <img src="<?php echo get_template_directory_uri(); ?>/images/overlay.jpg" class="overlay"/>
      <div class="overlay-title">
        <div class="overlay-title-container">
          <h1>ART IS FUN</h1>
        </div>
      </div>
    </div>
  </div>
  <?php
  $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
  $the_query = new WP_Query($args);
  ?>
  <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>

    <?php
    if( get_the_ID() == 7
    ): get_template_part("content", "page-button");
    endif; ?>
    <?php
    if( get_the_ID() == 9  ||
        get_the_ID() == 13 ||
        get_the_ID() == 15
    ): get_template_part("content", "page");
    endif; ?>


    <?php
    if( get_the_ID() == 19
    ): get_template_part("content", "page-contact");
    endif; ?>

  <?php endwhile; endif; ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
