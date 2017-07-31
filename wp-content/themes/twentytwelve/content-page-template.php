<?php
/*
   Template Name: page-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
    </div>
    <p>
      <?php printf(get_field('main-title', get_the_ID())); ?>
    </p>
    <p>
      <?php printf(get_field('main-text', get_the_ID())); ?>
    </p>
    <?php if( get_the_ID() == 132): get_template_part("wat-doen-wij", "part"); endif; ?>
    <?php
    $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
    $the_query = new WP_Query($args);
    ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
    <?php if( get_the_ID() == 271): get_template_part("ons-netwerk", "part"); endif; ?>
  </div>
  <div id="contact" class="contact-form-small contact_form-<?php the_ID(); ?>">
    <div class="contact-title-container">
      <div class="contact-title">
        <h3>CONTACT OPNEMEN</h3>
      </div>
    </div>
    <div class="contact-form-small-container">
      <?php
      $id=286;
      $post = get_post($id);
      $content = apply_filters('the_content', $post->post_content);
      echo $content;
      ?>
    </div>
  </div>
</article>

<?php get_footer(); ?>
