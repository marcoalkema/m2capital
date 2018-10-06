<div class="introduction-container">
  <div>
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 7 : 1464;
            printf(get_field('intro_title', $ID));
          };
          ?></h4>
      </div>
    </div>
    <p>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 7 : 1464;
        printf(get_field('intro_text', $ID));
      };
      ?>
    </p>
  </div>
</div>

<div class="introduction-links-container">
  <?php
  $arr = get_field('introduction-links', $ID);
  $i = 0;
  $row = 1;
  foreach($arr as $val) {

    if ($i % 2 == 0) {
      echo '<div class="row">';
      echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 network-col wat-doen-wij-info-container">';
      echo '<div class="introduction-links-image-container">';
      echo '<img class="introduction-links-image" src="' . $val['introductie-links-img'] . '"/>';
      echo '</div>';
      echo '<div class="wat-doen-wij-header-container underlineWhite">' . $val['introductie-links-title'] . '</div>';
      echo '<div class="wat-doen-wij-info-text-container">' . $val['introductie-links-text'] . '</div>';
      echo '<div class="wat-doen-wij-btn-container">';
      echo '<button class="whiteBlue">' . $val['introductie-links-button-tekst'] . '</button>';
      echo '</div>';
      echo '</div>';
    } else {
      echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 network-col wat-doen-wij-info-container">';
      echo '<div class="introduction-links-image-container">';
      echo '<img class="introduction-links-image" src="' . $val['introductie-links-img'] . '"/>';
      echo '</div>';
      echo '<div class="wat-doen-wij-header-container underlineWhite">' . $val['introductie-links-title'] . '</div>';
      echo '<div class="wat-doen-wij-info-text-container">' . $val['introductie-links-text'] . '</div>';
      echo '<div class="wat-doen-wij-btn-container">';
      echo '<button class="whiteBlue">' . $val['introductie-links-button-tekst'] . '</button>';
      echo '</div>';
      echo '</div>';

      if ($i % (1 * $row + ($row - 1)) == 0) {
        echo '</div>';
        $row++;
      }
    }
    ;
    if ($i == count($arr) - 1) {
      echo '</div>';

      if ($i % 2 != 0) {
        echo '</div>';
      }
    }
    $i++;

  }

  ?>
</div>
