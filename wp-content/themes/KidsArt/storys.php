<?php
/*
   Template Name: storys-template
 */


get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main_header"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content storys">
      <div class="storys_text">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('storys_title')); ?>
            </h4>
          </div>
        </div>
        <?php printf(get_field('storys_text')); ?>
      </div>

      <div class="storiesWhite">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 12 : 17;
        $args = array(
          'numberposts' => 0,
          'offset' => 0,
          'category' => $ID,
          'orderby' => 'post_date',
          'order' => 'ASC',
          'include' => '',
          'exclude' => '',
          'meta_key' => '',
          'meta_value' =>'',
          'post_type' => 'post',
          'post_status' => 'draft, publish, future, pending, private',
          'suppress_filters' => true
        );



        for ($x = 0; $x <=14; $x++) {
          if (!empty(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID'])) {
            if ($x % 3 == 0) {
              echo '<div class="row other_stories_container">';
            }
            echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
            echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 story_preview">';
            echo '<div class="story_preview_container">';
            echo '<div class="story_preview_text">';
            echo '<div class="story_preview_text_mask">';
            echo '</div>';
            echo '<div class="story_preview_text_container">';
            echo '<div class="h4_block">';
            echo '<div class="h4_container">';
            echo '<h4 class="white">';
            echo wp_get_recent_posts( $args, ARRAY_A )[$x]['post_title'];
            echo '</h4>';
            echo '</div>';
            echo '</div>';
            echo '<p class="story_excerpt textWhite">';
            echo get_field('story_excerpt', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
            echo '</p>';
            echo '</div>';
            echo '</div class="story_preview_image">';
            echo '<img class="story_thumbnail" src="' . get_the_post_thumbnail_url(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '"/>';
            echo '</div>';
            echo '</div>';
            echo '</a>';

            if ($x % 3 == 2) {
              echo '</div>';
            }
          }
        }
          echo '</div>';
        }
        ?>
      </div>
    </div>
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
                       ? get_home_url() . '/publicaties/'
                       : '/publicaties/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-white"><?php printf(get_field('button_publicaties', get_the_ID())); ?></button>
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
