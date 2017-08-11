<div id="contact" class="entry-content contact-page" id="page-<?php the_ID(); ?>">
  <div class="contact-form-template">
    <div class="contact-text">
      <p>
        <?php the_field('contact_text', 19); ?>
      </p>
    </div>
    <div class="contact-title-container-large">
      <div id="contact-title-<?php the_ID(); ?>" class="contact-title">
        <h3>CONTACT OPNEMEN</h3>
      </div>
    </div>
    <div class="contact-large">
      <?php echo do_shortcode( '[contact-form-7 id="277" title="Contact - Uitgebreid" html_id=the_ID()]' ); ?>
    </div>
    <div class="row">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-8 location-title">
        <h3>ONZE LOCATIE</h3>
      </div>
    </div>
    <div class="row contact-details">
      <div class="col-lg-4 contact-fields">
        <?php do_shortcode('[my_contact_field]'); ?>
      </div>
      <div class="col-lg-8 gmap-container">
        <div id="map-overlay" onClick="style.pointerEvents='auto'">
          <?php do_shortcode('[my_google_map]'); ?>
        </div>
      </div>
    </div>

  </div>
</div>
