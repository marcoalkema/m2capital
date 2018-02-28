<div id="contact" class="entry-content contact-page compact-contact-page">
  <div class="contact-form-template">
    <div class="contact-title-container-large">
      <div class="contact-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="black underlineBlack">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1031 : 1370;
                the_field('contact_headertext', $ID);
              } ?>
            </h4>
          </div>
        </div>
      </div>

      <div class="contact-text">
        <p>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1031 : 1370;
            the_field('contact_text', $ID);
          };
          ?>
        </p>
      </div>
      <div class="contact-button-container">
        <a href="mailto:info@stepping-forward.com?subject=
           <?php
           $id = get_the_ID();

           if ($id === 613) {
             echo 'Workshops & Trainingen';
           }
           if ($id === 628) {
             echo 'Workshops & Trainings';
           }
           if ($id === 643) {
             echo 'Systeemisch Werken';
           }
           if ($id === 1265) {
             echo 'Systemic Working';
           }
           if ($id === 1270 || $id === 632) {
             echo 'coaching';
           } else {
             printf(get_field('mail-subject', get_the_ID()));
           }
           ?>
        ">
          <button class="btn btn-green">CONTACT</button>
        </a>
      </div>
    </div>
  </div>
</div>
