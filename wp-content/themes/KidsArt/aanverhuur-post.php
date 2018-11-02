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
        echo '<div class="row other_stories_container aanverhuuritems">';
      }
      echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
      echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 story_preview hoverovereffect">';
      echo '<div class="story_preview_container">';
      echo '<div class="story_preview_image">';
      echo '<img class="story_thumbnail" src="' . get_field("afbeelding", wp_get_recent_posts($args, ARRAY_A )[$x]['ID']) . '"/>';
      echo '</div>';
      echo '<div class="story_preview_text_container">';
      echo '<div class="h4_block">';
      echo '<div class="h4_container">';
      echo '<h4>';
      echo get_field('adres', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</h4>';
      echo '<div class="object-type">';
      echo get_field('soort_object', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="post-excerpt textWhite">';
      echo get_field('samenvatting', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
      echo '</div>';
      echo '<br/>';
      echo '<div>';
      echo '<table class="aanverhuur-table-items">';
      echo '<tr class="info1">';
      echo '<td>' . get_field('status', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '<td>' . get_field('prijs', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '</tr>';
      echo '<tr class="info2">';
      echo '<td class="smallTxt">' . get_field('status_2', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
      echo '<td class="smallTxt">' . get_field('prijs2', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '</td>';
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
