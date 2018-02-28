<?php
/*
   Template Name: about-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main_header"); ?>" class="headerImg"/>
      <div class="page-title-container">
        <div class="page-title-div about-page-title">
          <div class="page-title-background"></div>
          <h6 id="landing-overlay-title" class="white"><?php printf(get_field('main-title', get_the_ID())); ?></h6>
        </div>
      </div>
    </div>
    <div class="template-page-content">
      <div -<?php the_ID(); ?>" class="about-text">
        <p>
          <?php printf(get_field('about_text', get_the_ID())); ?>
        </p>
      </div>

      <div id="waar_ben_ik" class="google_map has-background">
        <div class="whereabouts-container">
          <div class="h4_block">
            <div class="h4_container">
              <h4 class="white underlineWhite">
                <?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
                  printf(get_field('where_am_i_title', $ID));
                }
                ?>
              </h4>
            </div>
          </div>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
            printf(get_field('where_am_i_text', $ID));
          }
          ?>
        </div>
        <div class="map-canvas"></div>
        <script>
         gmaps_results_initialize(
           <?php
           if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
             $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
             printf(json_encode(get_field('mijn_locatie', $ID)['body']));
           }
           ?>,
           <?php
           if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
             $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
             printf(json_encode(get_field('contact_lokaties', $ID)['body']));
           };
           ?>,
           '../'
         )
        </script>
        <!-- GOOGLE MAP -->
      </div>

      <div id="mission-text-<?php the_ID(); ?>" class="mission-text <?php if ( (get_field('vision_toggle', get_the_ID())) ) {
                                                                    echo '';
                                                                    } else {
                                                                      echo'inactive';
                                                                    }?>">
        <p>
          <?php printf(get_field('mission_text', get_the_ID())); ?>
        </p>
      </div>

      <div id="large-tagline-<?php the_ID(); ?>" class="large-tagline">
        <img src="<?php the_field("tagline_image"); ?>">
        <!-- <div class="large-tagline-mask"></div> -->
        <div class="long_tagline about_tagline">
          <?php printf(get_field('long_tagline', get_the_ID())); ?>
        </div>
      </div>


      <div id="vision-text-<?php the_ID(); ?>" class="vision-text <?php if ( (get_field('vision_toggle', get_the_ID())) ) {
                                                                  echo '';
                                                                  } else {
                                                                    echo'inactive';
                                                                  }?>">
        <p>
          <?php printf(get_field('vision_text', get_the_ID())); ?>
        </p>
      </div>

    </div>
    <?php get_template_part("contact", "page"); ?>
  </div>
</article>

<?php get_footer(); ?>
