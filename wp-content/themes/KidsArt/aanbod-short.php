<div class="aanbod-intro-container">
  <div class="aanbod-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
            printf(get_field('aanbod_titel', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
      printf(get_field('aanbod_text', $ID));
    }?>
  </div>

  <div class="row aanbod-intro-row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 aanbod-intro-col">
      <div class="aanbod-intro-img-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/workshops-trainingen/'
                       : '/workshops-trainingen/?lang=en';
                   echo $ID;};
                 ?>">
        <img src="<?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                    printf(get_field('coaching_image', $ID));
                  }
                  ?>"/>
        </a>
      </div>
      <h4 class="green aanbodH4"><?php
                                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                   $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                   printf(get_field('coaching_titel', $ID));
                                   }
                                 ?></h4>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
        printf(get_field('coaching_tekst', $ID));
      }
      ?>
      <div class="contact-button-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/workshops-trainingen/'
                       : '/workshops-trainingen/?lang=en';
                   echo $ID;};
                 ?>">
        <button class="btn btn-green"><?php
                                      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                        printf(get_field('button_label', $ID));
                                      };
                                      ?></button>
        </a>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 aanbod-intro-col">
      <div class="aanbod-intro-img-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/systeemisch-werken/'
                       : '/systeemisch-werken/?lang=en';
                   echo $ID;};
                 ?>">
        <img src="<?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                    printf(get_field('systeemisch_werken_image', $ID));
                  }
                  ?>"/>
        </a>
      </div>
      <h4 class="green aanbodH4"><?php
                                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                   $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                   printf(get_field('systeemisch_werken_titel', $ID));
                                   }
                                 ?></h4>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
        printf(get_field('systeemisch_werken_text', $ID));
      }
      ?>
      <div class="contact-button-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/systeemisch-werken/'
                       : '/systeemisch-werken/?lang=en';
                   echo $ID;};
                 ?>">
          <button class="btn btn-green"><?php
                                      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                        printf(get_field('button_label', $ID));
                                      }
                                        ?></button>
        </a>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 aanbod-intro-col">
      <div class="aanbod-intro-img-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/coaching/'
                       : '/coaching/?lang=en';
                   echo $ID;};
                 ?>">
        <img src="<?php
                  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                    printf(get_field('workshops_trainingen_image', $ID));
                  }
                  ?>"/>
        </a>
      </div>
      <h4 class="green aanbodH4"><?php
                                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                   $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                   printf(get_field('workshops_trainingen_titel', $ID));
                                 }?></h4>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
        printf(get_field('workshops_trainingen_text', $ID));
      }
      ?>
      <div class="contact-button-container">
        <a href="<?php
                 if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                   $ID = (ICL_LANGUAGE_CODE == 'nl')
                       ? get_home_url() . '/coaching/'
                       : '/coaching/?lang=en';
                   echo $ID;};
                 ?>">
        <button class="btn btn-green"><?php
                                      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                                        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
                                        printf(get_field('button_label', $ID));
                                      }?></button>
        </a>
      </div>
    </div>
  </div>
</div>
