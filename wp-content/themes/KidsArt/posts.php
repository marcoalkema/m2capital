<?php
/*
 * Template Name: Story
 * Template Post Type: post, page, product
 */

get_header();  ?>
<div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <?php
    $cat = get_the_category()[0]->name;
    printf($cat);
    if ($cat == 'Actueel') {
      get_template_part("actueel", "post");
    } elseif ($cat == '(Her)ontwikkeling') {
      get_template_part("actueel", "post");
    } elseif ($cat == 'Beleggingsadvies') {
      get_template_part("actueel", "post");
    } elseif ($cat == 'Aan & verhuur') {
      get_template_part("aanverhuur", "post-page");
    } elseif ($cat == 'Asset Management') {
      get_template_part("actueel", "post");
    } else {
      get_template_part("actueel", "post");
    }
    ?>

  <?php get_template_part("contact", "page"); ?>
</div>
</article>
<?php get_footer(); ?>
