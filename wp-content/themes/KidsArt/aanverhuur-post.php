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
      echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
      echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 story_preview">';
      echo '<div class="story_preview_container">';
      echo '<div class="story_preview_text_container">';
      echo '<div class="h4_block">';
      echo '<div class="h4_container">';
      echo '<div class="story_preview_image">';
      echo '<img class="story_thumbnail" src="' . get_field("afbeelding", wp_get_recent_posts($args, ARRAY_A )[$x]['ID']) . '"/>';
      echo '</div>';
      echo '<h4>';
      echo get_field('adres', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</h4>';
      echo '<h4>';
      echo get_field('soort_object', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</h4>';
      echo '<p class="post-excerpt textWhite">';
      echo get_field('samenvatting', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</p>';
      echo '<br/>';
      echo '<div>';
      echo '<table>';
      echo '<tr>';
      echo '<td>' . get_field('status', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '<td>' . get_field('prijs', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>' . get_field('status_2', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '<td>' . get_field('prijs2', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '</tr>';
      echo '</table>';
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
