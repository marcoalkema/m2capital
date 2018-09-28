<div class="page-header-image">
  <img src="<?php the_field("post-img"); ?>" class="headerImg"/>
  <div class="page-title-container">
    <div class="page-title-div">
      <div class="page-title-background"></div>
      <h3 id="landing-overlay-title" class="white"><?php printf(get_field('post-title', get_the_ID())); ?></h3>
    </div>
  </div>
</div>
<div class="template-page-content story">
  <div class="h4_block">
    <div class="h4_container">
      <h4 class="green underlineGreen">
        <?php
        $cat = get_the_category()[0]->name;
        printf(get_field('post-undertitle', get_the_ID()));
        if ($cat != 'Actueel') {
          printf('<div class="category-header">' . $cat . '</div>');
        }
        ?>
      </h4>
    </div>
  </div>
  <?php printf(get_field('post-text'));
  ?>
</div>
<div class="other_stories">
  <?php
  $args = array(
    'numberposts' => 3,
    'offset' => 0,
    'category' => get_the_category()[0]->cat_ID,
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

  for ($x = 0; $x <= count(wp_get_recent_posts( $args, ARRAY_A )).length - 1; $x++) {
    echo '<a href="' . get_permalink(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '">';
    echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 story_preview">';
    echo '<div class="story_preview_container">';
    echo '<div class="story_preview_text">';
    echo '<div class="story_preview_text_mask">';
    echo '</div>';
    echo '<div class="story_preview_text_container">';
    echo '<div class="h4_block">';
    echo '<div class="h4_container">';
    echo '<h4>';
    echo get_field('post-title', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
    echo '</h4>';
    echo '</div>';
    echo '</div>';
    echo '<p class="story_excerpt textWhite">';
    echo get_field('post-excerpt', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']);
    echo '</p>';
    echo '</div>';
    echo '</div class="story_preview_image">';
    echo '<img class="story_thumbnail" src="' . get_field('post-img', wp_get_recent_posts( $args, ARRAY_A )[$x]['ID']) . '"/>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
  };
  echo '</div>';
  ?>
</div>
<?php get_template_part("contact", "page"); ?>
<script>
 var category = <?php echo get_the_category()[0]->cat_ID ?>;
 console.log(category)
 if (category === 12 ||
     category === 13 ||
     category === 17 ||
     category === 14
 ) {
   document.getElementById('menu-item-1556').style.borderBottom = '2px solid white'
   document.getElementById('menu-item-1555').style.borderBottom = '2px solid white'
 }
</script>
