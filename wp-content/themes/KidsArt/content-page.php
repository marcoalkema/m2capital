<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-header-image">
    <img src="<?php printf(the_field("img1", 3047)); ?>" class="headerImg"/>
  </div>
  <div class="entry-content" id="page-<?php the_ID(); ?>">
    <?php
    the_content();
    ?>
  </div>
</article>
