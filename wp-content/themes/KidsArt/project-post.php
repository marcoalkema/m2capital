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
      echo '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 story_preview">';
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
      echo '<br/>';
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

<div class="project-else">
  <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>
  <button class="btn btn-green">Meer projecten zien?</button>
  <p>Zie ook onze andere portfolio pagina’s. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
  <a href=""> <!-- Base link on what project we're in -->
    <button class="btn btn-green big">
      <span class="btn-text">
        <?php
        $cat = get_field('categorie', get_the_ID());
        if ($cat == 27 || $cat == 24 || $cat == 25) {
          echo 'Beleggingsadvies';
        } else {
          echo 'Asset Management';
        }
        ?>
      </span><br> <!-- Base text on what project we're in -->
      <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>
    </button>
  </a>
  <a href=""> <!-- Base link on what project we're in -->
    <button class="btn btn-green big">
      <span class="btn-text">
        <?php
        $cat = get_field('categorie', get_the_ID());
        if ($cat == 27 || $cat == 26 || $cat == 25) {
          echo '(Her)ontwikkeling';
        } else {
          echo 'Asset management';
        }
        ?>
      </span><br> <!-- Base text on what project we're in -->
      <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>
    </button>
  </a>
</div>
