<?php
/*
   Template Name: publications-template
 */


get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="publications-template">
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main_header"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content publicaties">
      <div class="storys_text">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('publicaties_title')); ?>
            </h4>
          </div>
        </div>
        <?php printf(get_field('publicaties_text')); ?>
      </div>
    </div>
  </div>
  <div class="lightbox">
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl')
          ? '3'
          : '5';
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
                       : '/storys-2/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-white"><?php printf(get_field('button_storys', get_the_ID())); ?></button>
        </a>
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/gallery/'
                       : '/gallery/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-white"><?php printf(get_field('button_gallery', get_the_ID())); ?></button>
        </a>
      </div>
    </div>
  </div>
  <?php get_template_part("contact", "page"); ?>
</article>

<?php get_footer(); ?>
