<div class="aanbod-intro-container">
  <div class="aanbod-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
            printf(get_field('wat-doen-wij-title', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 1466;
      printf(get_field('wat-doen-wij-text', $ID));
    }?>
  </div>

  <div class="network-container">
    <?php
    $arr = get_field('wat-doen-wij-links', $ID);
    $i = 0;
    $row = 1;
    foreach($arr as $val) {

      if ($i % 4 == 0) {
        echo '<div class="row">';
        echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
        echo '<a target="_blank" href="http://' . $val['wat-doen-wij-links-link'] . '">';
        echo '<img class="network-image" src="' . $val['wat-doen-wij-links-foto'] . '"/>';
        echo '<h4>' . $val['wat-doen-wij-links-title'] . '</h4>';
        echo '</a>';
        echo '</div>';
      } else {
        echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
        echo '<a target="_blank" href="http://' . $val['wat-doen-wij-links-link'] . '">';
        echo '<img class="network-image" src="' . $val['wat-doen-wij-links-foto'] . '"/>';
        echo '<h4>' . $val['wat-doen-wij-links-title'] . '</h4>';
        echo '</a>';
        echo '</div>';

        if ($i % (3 * $row + ($row - 1)) == 0) {
          echo '</div>';
          $row++;
        }
      }
      ;
      if ($i == count($arr) - 1) {
        echo '</div>';

        if ($i % 4 != 0) {
          echo '</div>';
        }
      }
      $i++;

    }

    ?>
  </div>
</div>
