<div class="page-header-image">
  <img src="<?php the_field("post-img"); ?>" class="headerImg"/>
  <div class="page-title-container">
    <div class="page-title-div">
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

  <div class="interest-in-project">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php printf(get_field('wie-zijn-wij-title123123', get_the_ID())); ?>
          Geinteresseerd in dit project?
        </h4>
      </div>
    </div>
    <p>
      Neem dan contact op met ons via de onderstaande knop!
    </p>
    <a href="#contact" data-ps2id="true" class="ps2id">
      <button class="btn btn-green">Contact</button>
    </a>
  </div>

</div>

<div class="other_stories">

  <div class="h4_block">
    <div class="h4_container">
      <h4 class="underlineGreen">
        <?php printf(get_field('soortgelijke_projecten_titel', 1939)); ?>
      </h4>
    </div>
  </div>

  <?php printf(get_field('soortgelijke_projecten_text', 1939)); ?>

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
    echo '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 story_preview_story">';
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
        echo '</div>';
      echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
  };
  echo '</div>';
  ?>

  <p><?php printf(get_field('volledige_overzicht_text', 1939)); ?></p>
  <button class="whiteBlue"><?php printf(get_field('volledige-overzicht-button-text', 1939)); ?></button>

</div>

<?php get_template_part("contact", "page"); ?>
