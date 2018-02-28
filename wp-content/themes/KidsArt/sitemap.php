<?php
/*
   Template Name: sitemap-template
 */

get_header(); ?>

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page centerBtns" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("header_image"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content">
      <div class="main-text">
        <?php echo do_shortcode('[wp_sitemap_page only="page"]'); ?>
      </div>
    </div>
  </div>
</article>

<?php get_footer(); ?>
