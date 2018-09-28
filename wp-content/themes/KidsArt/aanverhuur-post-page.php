<div>
  HEADERZZZ
</div>

<?php
$fields = get_field_objects();

$cat = get_field('categorie', get_the_ID());
$args = array(
  'numberposts' => 0,
  'offset' => 0,
  'category' => $cat,
  'orderby' => 'post_date',
  'order' => 'ASC',
  'include' => '',
  'exclude' => '',
  'meta_key' => '',
  'meta_value' =>'',
  'post_type' => 'post',
  'post_status' => 'draft, publish, future, pending, private',
  'suppress_filters' => true
);
$more_details = get_field('meer_details', get_the_ID());

/* STANDAARD FOTO*/
echo '<div class="page-header-image">';
echo '<img src="' . get_field('afbeelding', get_the_ID()) . '" class="headerImg"/>';
echo '</div>';
echo '<div class="row">';
/* Heading*/
echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">';
echo  get_field('status', get_the_ID());
echo  get_field('status_2', get_the_ID());
echo '</div>';
echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">';
echo  get_field('adres', get_the_ID());
echo '</div>';
echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">';
echo  get_field('prijs', get_the_ID());
echo  get_field('prijs2', get_the_ID());
echo '</div>';
echo '</div>';
/* Kenmerken*/
echo '<div>';
echo '<h3>Kenmerken van het object</h3>';
echo '<table>';
echo '<tr>';
echo '<td>Soort object:</td>';
echo '<td>' . get_field('soort_object', get_the_ID()) . '</td>';
echo '<td>Bedrijfsoppervlakte:</td>';
echo '<td>' . get_field('bedrijfsoppervlakte', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Bouwvorm:</td>';
echo '<td>' . get_field('bouwvorm', get_the_ID()) . '</td>';
echo '<td>Bruto vloeroppervlakte:</td>';
echo '<td>' . get_field('bruto_vloeroppervlakte', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Bouwjaar:</td>';
echo '<td>' . get_field('bouwjaar', get_the_ID()) . '</td>';
echo '<td>Totaal BVO</td>';
echo '<td>' . get_field('totaal_bvo', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Ligging:</td>';
echo '<td>' . get_field('ligging', get_the_ID()) . '</td>';
echo '<td>VVO m2:</td>';
echo '<td>' . get_field('vvo_m2', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Beschikbaarheid:</td>';
echo '<td>' . get_field('beschikbaarheid', get_the_ID()) . '</td>';
echo '<td>VVO Kantoor</td>';
echo '<td>' . get_field('vvo_kantoor', get_the_ID()) . '</td>';
echo '</tr>';
echo '</table>';
echo '</div>';

/* MEER KENMERKEN*/
if (!empty($more_details)) {
  echo '<button>Meer details</button>';
  echo '<div>';
  echo '<table>';
  for ($x = 0; $x <= count($more_details); $x++) {
    echo '<tr>';
    echo '<td>' . $more_details['body'][$x][0]['c'] . '</td>';
    echo '<td>' . $more_details['body'][$x][1]['c'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
  echo '</div>';
}

/* OMSCHRIJVING*/
echo '<div>';
echo '<h3>Omschrijving van het object</h3>';
echo '<div>' . get_field('omschrijving', get_the_ID()) . '</div>';
echo '<button>Meer kenmerken</button>';

/* OMSCHRIJVING MEER*/
echo '<div>' . get_field('omschrijving_meer', get_the_ID()) . '</div>';
echo '</div>';

/* CONTACT*/
echo '<div>';
echo '<button>Deze ruimte komen bezichtigen</button>';
echo '</div>';


echo '</div>';
echo '</div>';
echo '</a>';
?>
