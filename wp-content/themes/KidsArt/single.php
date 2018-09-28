<?php
/*
 * Template Name: Story
 * Template Post Type: post, page, product
 */

get_header();  ?>
<div class="entry-content template-page" id="page-<?php the_ID(); ?>">
  <?php
  $cat = get_the_category()[0]->cat_ID;
  if ($cat == 25) {
    get_template_part("aanverhuur", "post-page");
  } else {
    get_template_part("actueel", "post");
  }
  ?>
</div>
<?php get_footer(); ?>
