<div class="network-container">
<?php
$arr = get_field('netwerk-gallery');
$i = 0;
$row = 1;
foreach($arr as $val) {

  if ($i % 4 == 0) {
    echo '<div class="row">';
    echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
    echo '<a target="_blank" href="http://' . $val['netwerk-link'] . '">';
    echo '<img class="network-image" src="' . $val['netwerk-afbeelding'] . '"/>';
    echo '</a>';
    echo '</div>';
  } else {
    echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
    echo '<a target="_blank" href="http://' . $val['netwerk-link'] . '">';
    echo '<img class="network-image" src="' . $val['netwerk-afbeelding'] . '"/>';
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
