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
      echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 network-col">';
      echo '<img class="introduction-links-image" src="' . $val['introductie-links-img'] . '"/>';
      echo '<div>' . $val['introductie-links-title'] . '</div>';
      echo '<div>' . $val['introductie-links-text'] . '</div>';
      echo '<button>' . $val['introductie-links-button-tekst'] . '"</button>';
      echo '</div>';
    } else {
      echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 network-col">';
      echo '<img class="introduction-links-image" src="' . $val['introductie-links-img'] . '"/>';
      echo '<div>' . $val['introductie-links-title'] . '</div>';
      echo '<div>' . $val['introductie-links-text'] . '</div>';
      echo '<button>' . $val['introductie-links-button-tekst'] . '"</button>';
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
