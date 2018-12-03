<div id="contact" class="entry-content contact-page"">
  <div class="contact-form-template">
    <div class="contact-title-container-large">
      <div class="contact-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen smalleUnderline">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 3169;
                the_field('contact_header_text', $ID);
              };
              ?>
            </h4>
          </div>
        </div>
      </div>
    </div>

    <div class="centerBtns">
      <button id="foldBtn" class="btn btn-green foldBtn active_ btn-primary">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? "Contact" : "Contact";
          echo $ID;
        };
        ?>
      </button>
    </div>

    <div id="foldalbe-contact" class="foldalbe-contact">

      <div class="contact-text">
        <p>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 3169;
            the_field('contact_text', $ID);
          };
          ?>
        </p>
      </div>


      <div class="row contact-details">
        <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 contact-large">
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
