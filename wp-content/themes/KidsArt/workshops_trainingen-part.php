<?php

/*
   Template Name: workshops_trainingen-template
 */

get_header(); ?>

<div class="offers-more-info">
  <p>
    <?php printf(get_field('other_packages_text', get_the_ID())); ?>
  </p>
  <a href="<?php
           if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
             $ID = (ICL_LANGUAGE_CODE == 'nl')
                 ? get_home_url() . '/coaching/'
                 : '/coaching/?lang=en';
             echo $ID;};
           ?>">
    <button class="btn btn-green"><?php printf(get_field('coaching_button_label', get_the_ID())); ?></button>
  </a>
  <a href="<?php
           if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
             $ID = (ICL_LANGUAGE_CODE == 'nl')
                 ? get_home_url() . '/systeemisch-werken/'
                 : '/systeemisch-werken/?lang=en';
             echo $ID;};
           ?>">
    <button class="btn btn-green"><?php printf(get_field('systeemisch_werken_button_label', get_the_ID())); ?></button>
  </a>
</div>

<div class="references">
  <?php
  if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 641 : 1457;
    echo do_shortcode('[CPTESTIMONIAL id=' . $ID . ']');
  }
  ?>
</div>

<div class="fees">
  <div class="h4_block">
    <div class="h4_container">
      <h4 class="green underlineGreen">
        <?php printf(get_field('tarieven_title', get_the_ID())); ?>
      </h4>
    </div>
  </div>
  <p>
    <?php printf(get_field('fees_text', get_the_ID())); ?>
  </p>

  <div class="fees_table_container">
    <?php
    $ratesArray = get_field('fees_table', get_option('page_for_posts'));
    $length = count($ratesArray['body']);
    $ratesHTML = '<table class="fees_table">';

    for ($x = 0; $x < $length; $x++) {
      $ratesHTML = $ratesHTML .
                   '<tr>
                    <td>' . ($ratesArray['body'][$x][0]['c']) . '</td>
                    <td>' . ($ratesArray['body'][$x][1]['c']) . '</td>
                    <td>' . ($ratesArray['body'][$x][2]['c']) . '</td>
                  </tr>';
    }
    echo $ratesHTML . '</table>';
    ?>
  </div>

  <a href="mailto: info@stepping-forward.com">
    <button class="btn btn-green"><?php printf(get_field('tarieven_button1', get_the_ID())); ?></button>
  </a>
  <a href="<?php
           if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
             $ID = (ICL_LANGUAGE_CODE == 'nl')
                 ? get_home_url() . '/tarieven/'
                 : '/prices/?lang=en';
             echo $ID;};
           ?>">
    <button class="btn btn-green"><?php printf(get_field('tarieven_button2', get_the_ID())); ?></button>
  </a>
</div>

<div class="calendar">
  <div class="calendar-container">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="white underlineWhite">
          AGENDA
        </h4>
      </div>
    </div>
    <div class="textWhite">
      <?php printf(get_field('calendar_text1', get_the_ID())); ?>
    </div>
    <div class="agenda agenda_in_offer">
      <?php echo do_shortcode('[tb-calendar nofilter="yes" notimezone="yes" booking="workshop"]'); ?>
    </div>
    <div class="textWhite">
      <?php printf(get_field('calendar_text2', get_the_ID())); ?>
    </div>
  </div>
</div>
