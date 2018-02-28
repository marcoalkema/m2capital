<div class="stories-intro-container">
  <div class="stories-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 1504;
            printf(get_field('stories_titel', $ID)); }?>
        </h4>
      </div>
    </div>
    <div class="stories_text">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 1504;
        printf(get_field('stories_text', $ID));
      }?>
    </div>

    <div class="other_stories storiesWhite">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 12 : 17;

        $args = array(
          'numberposts' => 3,
          'offset' => 0,
          'category' => $ID,
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
          if (!empty(wp_get_recent_posts( $args, ARRAY_A )[$x]['ID'])) {
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
          };
        }
        echo '</div>';
      }
      ?>
    </div>
    <div class="contact-button-container">
      <a href="<?php
               if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                 $ID = (ICL_LANGUAGE_CODE == 'nl')
                     ? get_home_url() . '/storys-2/'
                     : '/storys-2/?lang=en';
                 echo $ID;};
               ?>">
      <button class="btn btn-green"><?php
                                    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 904 : 1504;
                                      printf(get_field('button_text', $ID));
                                    }?></button>
      </a>
    </div>
  </div>
</div>
