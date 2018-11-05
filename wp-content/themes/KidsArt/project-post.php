<?php
if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
  $args = array(
    'numberposts' => 0,
    'offset' => 0,
    'orderby' => 'post_date',
    'category' => '24, 27, 26',
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
    $IDx = wp_get_recent_posts( $args, ARRAY_A )[$x]['ID'];
    if (!empty($IDx) && ($IDx !== 25) && ($IDx !== 23)) {
      $foo = wp_get_recent_posts( $args, ARRAY_A )[$x]['ID'];
      $cat = get_the_category($foo)[0]->name;
      if ($x % 3 == 0) {
        echo '<div class="row other_stories_container">';
      }
      echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
      echo '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 story_preview hoverovereffect">';
      echo '<div class="story_preview_container">';
      echo '<div class="story_preview_image">';
      echo '<img class="story_thumbnail" src="' . get_field('post-excerpt-img', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '"/>';
      echo '</div>';
      echo '<div class="story_preview_text">';
      echo '<div class="story_preview_text_container">';
      echo '<div class="h4_block">';
      echo '<div class="h4_container">';
      echo '<h4 class="green underlineGreen">';
      echo wp_get_recent_posts( $args, ARRAY_A )[$x]['post_title'];
      echo '</h4>';
      echo '<div class="category-header">' . $cat . '</div>';
      echo '</div>';
      echo '</div>';
      echo '<p class="actueel-post-excerpt">';
      echo get_field('post-excerpt', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</p>';
      echo '</div>';
      echo '</div>';
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
