<div class="aanbod-intro-container">
  <div class="aanbod-intro">
    <div class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 3125;
            printf(get_field('wat-doen-wij-title', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <?php
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
      $ID1 = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 3125;
      printf(get_field('wat-doen-wij-text', $ID1));
    }?>
    <a href="<?php $languageString = (ICL_LANGUAGE_CODE == 'nl') ? '' : '?lang=en'; printf(get_site_url() . '/wat-doen-wij' . $languageString ); ?>">
        <button class="btn btn-green btn-primary">
            <?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID1 = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 3125;
                printf(get_field('wat-doen-wij-btn-text', $ID1));
            }?>
        </button>
    </a>
  </div>

  <div class="network-container">
      <?php
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 867 : 3125;
      $arr = array_reverse(get_field('wat-doen-wij-links', $ID));
      $i = 0;
      $row = 1;
      foreach($arr as $val) {

          if ($i % 4 == 0) {
              echo '<div class="row">';
              echo '<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 network-col hoverovereffect">';
              echo '<a href="' . get_site_url() . '/wat-doen-wij/' . $languageString . $val['wat-doen-wij-links-link'] . '">';
              echo '<div class="network-image-container">';
              echo '<img class="network-image" src="' . $val['wat-doen-wij-links-foto'] . '"/>';
              echo '</div>';
              echo '<div class="network-header-container">';
              echo '<h4 class="underlineGreen">' . $val['wat-doen-wij-links-title'] . '</h4>';
              echo '</div>';
              echo '</a>';
              echo '</div>';
          } else {
              echo '<div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 network-col hoverovereffect">';
              echo '<a href="' . get_site_url() . '/wat-doen-wij/' . $languageString . $val['wat-doen-wij-links-link'] . '">';
              echo '<div class="network-image-container">';
              echo '<img class="network-image" src="' . $val['wat-doen-wij-links-foto'] . '"/>';
              echo '</div>';
              echo '<div class="network-header-container">';
              echo '<h4 class="underlineGreen">' . $val['wat-doen-wij-links-title'] . '</h4>';
              echo '</div>';
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
