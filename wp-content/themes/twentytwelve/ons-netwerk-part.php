<div class="network-container">
<?php
$arr = get_field('netwerk-gallery');
$i = 0;
foreach($arr as $val) {
  if ($i % 4 == 0) {
    echo '<div class="row">';
    echo '<div class="col-lg-3 network-col">';
    echo '<a target="_blank" href="https://' . $val['netwerk-link'] . '">';
    echo '<img class="network-image" src="' . $val['netwerk-afbeelding'] . '"/>';
    echo '</a>';
    echo '</div>';
  } else {
    echo '<div class="col-lg-3 network-col">';
    echo '<a target="_blank" href="https://' . $val['netwerk-link'] . '">';
    echo '<img class="network-image" src="' . $val['netwerk-afbeelding'] . '"/>';
    echo '</a>';
    echo '</div>';

    if ($i % 3 == 0) {
      echo '</div>';
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
