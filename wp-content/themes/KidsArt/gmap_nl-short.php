<div -<?php the_ID(); ?>" class="google_map has-background">
  <div class="whereabouts-container">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="white underlineWhite">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
            printf(get_field('where_am_i_title', $ID));
          };
          ?>
        </h4>
      </div>
    </div>
    <p class="textWhite">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 760 : 1429;
        printf(get_field('where_am_i_text', $ID));
      }
      ?>
    </p>
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
