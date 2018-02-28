<div class="agenda-intro-container">
  <div class="agenda-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="white underlineWhite">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
            printf(get_field('agenda_titel', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <div class="textWhite">
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
        printf(get_field('agenda_text', $ID));
      }?>
    </div>
    <div class="agenda_legend">
      <div class="row">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="circle green"></div>
          <p>        <?php
                     if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                       $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
                     printf(get_field('green', $ID)); }?></p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="circle blue"></div>
          <p>        <?php
                     if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                       $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
                       printf(get_field('blue', $ID)); }?></p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="circle orange"></div>
          <p>        <?php
                     if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                       $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
                       printf(get_field('orange', $ID)); }?></p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <div class="circle pink"></div>
          <p>        <?php
                     if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                       $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
                       printf(get_field('pink', $ID)); }?></p>
        </div>
      </div>
    </div>
    <div class="agenda">
      <?php echo do_shortcode('[tb-calendar nofilter="yes" notimezone="yes"]'); ?>
    </div>
    <div class="textWhite agenda_undertext">
      <p>
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 889 : 1492;
          printf(get_field('agenda_undertext', $ID)); }?>
      </p>
    </div>
  </div>
</div>
