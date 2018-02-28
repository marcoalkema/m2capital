<?php
/*
 * Template Name: Story
 * Template Post Type: post, page, product
 */

get_header();  ?>
<div class="entry-content template-page" id="page-<?php the_ID(); ?>">
  <div class="page-header-image">
    <img src="<?php the_field("story_header_image"); ?>" class="headerImg"/>
    <div class="page-title-container">
      <div class="page-title-div about-page-title">
        <div class="page-title-background"></div>
        <h3 id="landing-overlay-title" class="white"><?php printf(get_field('story_title', get_the_ID())); ?></h3>
      </div>
    </div>
  </div>
  <div class="template-page-content story">
    <?php printf(get_field('post_content')); ?>
  </div>
  <div class="other_stories">
    <?php
    $args = array(
      'numberposts' => 3,
      'offset' => 0,
      'category' => 0,
      'orderby' => 'post_date',
      'order' => 'DESC',
      'include' => '',
      'exclude' => '',
      'meta_key' => '',
      'meta_value' =>'',
      'post_type' => 'post',
      'post_status' => 'draft, publish, future, pending, private',
      'suppress_filters' => true
    );

    echo '<div class="row other_stories_container">';
    for ($x = 0; $x <=2; $x++) {
      echo '<a class="story_preview" href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
      echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">';
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
      echo '</div>';
      echo wp_get_recent_posts( $args, ARRAY_A )[$x]['post_excerpt'];
      echo '</div class="story_preview_image">';
      echo '<img class="story_thumbnail" src="' . get_the_post_thumbnail_url(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '"/>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
    };
    echo '</div>';
    ?>
  </div>
  <?php get_template_part("contact", "page"); ?>
</div>
</article>
<?php get_footer(); ?>
