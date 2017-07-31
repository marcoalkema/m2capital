<?php
/*
   Template Name: contact-page-template
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div id="contact" class="entry-content" id="page-<?php the_ID(); ?>">
    <p>
      <?php the_field('contact_text', 19); ?>
    </p>
    <div>
      <?php
      $id=19;
      $post = get_post($id);
      $content = apply_filters('the_content', $post->post_content);
        echo $content;
      ?>
    </div>
    <div class="row">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-8">
        <p>ONZE LOCATIE</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 contact-fields">
        <?php do_shortcode('[my_contact_field]'); ?>
      </div>
      <div class="col-lg-8">
        <?php do_shortcode('[my_google_map]'); ?>
      </div>
    </div>
  </div>
</article>

<?php get_footer(); ?>
