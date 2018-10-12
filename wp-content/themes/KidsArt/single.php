<?php
/*
 * Template Name: Story
 * Template Post Type: post, page, product
 */

get_header();  ?>
<div class="entry-content template-page" id="page-<?php the_ID(); ?>">
  <?php
  $cat = get_the_category()[0]->cat_ID;
  $category_id = get_cat_ID('Client');
  if ($cat == 25) {
    get_template_part("aanverhuur", "post-page");
  } else if ($cat == 23 || $cat == 27 || $cat == 26 || $cat == 24) {
    get_template_part("actueel", "post");
  } else if ($category_id == 0) {
    get_template_part("client", "post");
  } else {
    get_template_part("actueel", "post");
  }
  ?>
</div>
<?php get_footer(); ?>
