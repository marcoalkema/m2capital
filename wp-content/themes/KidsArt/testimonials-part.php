<div class="testimonial-container">
  <?php
  $arr = get_field('testimonials_gallery');
  $i = 0;
  $row = 1;
  foreach($arr as $val) {

    if ($i % 3 == 0) {
      echo '<div class="row">';
      echo '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 network-col">';
      echo '<div>
              <div>
                <p>' . $val['testimonial_text'] . '</p>
              </div>
              <div><b>
                  '  . $val['testimonial_name'] .  '
              </b></div>
             <div class="textGreen"><b>
                  '  . $val['testimonial_place'] .  '
              </b></div>
            </div>';
      echo '</div>';
    } else {
      echo '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 network-col">';
      echo '<div>
              <div>
                <p>' . $val['testimonial_text'] . '</p>
              </div>
              <div><b>
                  '  . $val['testimonial_name'] .  '
              </b></div>
             <div class="textGreen"><b>
                  '  . $val['testimonial_place'] .  '
              </b></div>
            </div>';
      echo '</div>';

      if ($i % (2 * $row + ($row - 1)) == 0) {
        echo '</div>';

        $row++;
      }
    }
    ;
    if ($i == count($arr) - 1) {
      echo '</div>';

      if ($i % 3 != 0) {
        echo '</div>';
      }
    }
    $i++;
  }

  ?>
</div>
