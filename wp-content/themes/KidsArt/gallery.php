s<?php
 /*
    Template Name: gallery-template
  */


 get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main_header"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content gallery">
      <div class="gallery_text">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('gallery_title')); ?>
            </h4>
          </div>
        </div>
        <?php printf(get_field('gallery_text')); ?>
      </div>
    </div>
  </div>
  <div class="lightbox">
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl')
          ? '2'
          : '9';
      $ID2 = (ICL_LANGUAGE_CODE == 'nl')
           ? '1'
           : '8';
      echo do_shortcode('[wonderplugin_gridgallery id=' . $ID2 . ']');
      echo do_shortcode('[wonderplugin_gridgallery id=' . $ID . ']');
    };
    ?>

  </div>
  <div class="other_portfolio">
    <div class="other_portfolio_text">
      <?php printf(get_field('other_portfolio_text', get_the_ID())); ?>
      <div class="other_portfolio_buttons">
        <p class="textBlack">
          <?php printf(get_field('other_portfolio_also_see', get_the_ID())); ?>
        </p>
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/storys-2/'
                       : '/storys/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-white"><?php printf(get_field('button_storys', get_the_ID())); ?></button>
        </a>
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/publicaties/'
                       : '/publicaties/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-white"><?php printf(get_field('button_publicaties', get_the_ID())); ?></button>
        </a>
      </div>
    </div>
  </div>
  <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
