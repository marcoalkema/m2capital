<?php
$fields = get_field_objects();
if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
  $cat = get_field('categorie', get_the_ID());
  $args = array(
    'numberposts' => 0,
    'offset' => 0,
    'category' => $cat,
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
      echo '<br/>';
      echo date('n-j-Y', strtotime(wp_get_recent_posts( $args, ARRAY_A )[$x]['post_date']));
      echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
      echo '<button>Lees meer</button>';
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '<p class="post-excerpt textWhite">';
      echo get_field('post-excerpt', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</p>';
      echo '</div>';
      echo '</div class="story_preview_image">';
      echo '<img class="story_thumbnail" src="' . get_field("post-img", wp_get_recent_posts($args, ARRAY_A )[$x]['ID']) . '"/>';
      echo '</div>';
      echo '</div>';


      if ($x % 3 == 2) {
        echo '</div>';
      }
    }
  }
  echo '</div>';
}
?>