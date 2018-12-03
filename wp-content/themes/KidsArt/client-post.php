<div class="page-header-image">
  <img src="<?php printf(get_field('img2', 3047)); ?>" class="headerImg"/>
</div>
<?php while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; // end of the loop. ?>
