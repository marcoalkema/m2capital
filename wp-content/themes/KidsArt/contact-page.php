<div id="contact" class="entry-content contact-page"">
  <div class="contact-arrow-left">
    <img src="<?php echo get_template_directory_uri() ?>/images/contact-arrows.svg"/>
  </div>
  <div class="contact-arrow-right">
    <img src="<?php echo get_template_directory_uri() ?>/images/contact-arrows.svg"/>
  </div>
  <div class="contact-form-template">
    <div class="contact-title-container-large">
      <div class="contact-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="black underlineBlack">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 1356;
                the_field('contact_header_text', $ID);
              };
              ?>
            </h4>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-text">
      <p class="textBlack">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 1356;
          the_field('contact_text', $ID);
        };
        ?>
      </p>
    </div>

    <div class="centerBtns">
      <button id="foldBtn" class="btn btn-green foldBtn active_">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? "Meer info" : "More info";
          echo $ID;
        };
        ?>
      </button>
    </div>

    <div id="foldalbe-contact" class="foldalbe-contact">

    <div class="row contact-details">
      <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 contact-fields">
        <h4 class="black gegevens_label"><?php
                                         if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                           $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 1356;
                                           the_field('gegevens_label', $ID);
                                         };
                                         ?></h4>
        <?php do_shortcode('[my_contact_field]'); ?>
      </div>
      <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 contact-large">
        <h4 class="black"><?php
                          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 1356;
                            the_field('contactformulier_label', $ID);
                          };
                          ?></h4>
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          if ( ICL_LANGUAGE_CODE == 'nl' ) {
            echo do_shortcode( '[contact-form-7 id="277" title="Contact - Uitgebreid" html_id=the_ID()]' );
          } else {
            echo do_shortcode( '[contact-form-7 id="1369" title="Contact - Uitgebreid - Engels"]' );
          };
        };
        ?>
      </div>
    </div>

    </div>
  </div>
</div>
