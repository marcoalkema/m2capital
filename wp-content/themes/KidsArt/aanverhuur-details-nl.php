<?php
$fields = get_field_objects();
$cat_ = (ICL_LANGUAGE_CODE == 'nl') ? 'categorie' : 'category';
echo $cat_;
$cat = get_field($cat_, get_the_ID());
echo $cat;
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
echo '<div class="aanverhuur-container">';
echo '<div class="page-header-image">';
echo '<img src="' . get_field('afbeelding', get_the_ID()) . '" class="headerImg"/>';
echo '</div>';
echo '<div class="row intro-details">';
/* Heading*/
echo '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 intro-type">';
echo  get_field('status', get_the_ID());
echo '<br>';
echo  '<div class="smallStatus">' . get_field('status_2', get_the_ID()) . '</div>';
echo '</div>';
echo '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">';
echo '<h4 class="green underlineGreen">';
echo  get_field('adres', get_the_ID());
echo '</h4>';
echo '<div class="category-header">Aan & verhuur</div>';
echo '</div>';
echo '<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 intro-price">';
echo  get_field('prijs', get_the_ID());
echo '<br>';
echo  '<div class="smallStatus">' . get_field('prijs2', get_the_ID()) . '</div>';
echo '</div>';
echo '</div>';
/* Intro*/
echo '<div class="aanverhuur-intro">';
echo  get_field('introductie_tekst', get_the_ID());
echo '</div>';
/* Kenmerken*/
echo '<div class="aanverhuur-kenmerken">';
echo '<div class="h4_block">';
echo '<div class="h4_container">';
echo '<h4 class="aanverhuur-kenmerken-titel">Kenmerken van het object</h4>';
echo '</div>';
echo '</div>';
echo '<table class="kenmerken-tabel">';
echo '<tr>';
echo '<td>Soort object:</td>';
echo '<td>' . get_field('soort_object', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Bouwvorm:</td>';
echo '<td>' . get_field('bouwvorm', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Bouwjaar:</td>';
echo '<td>' . get_field('bouwjaar', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Ligging:</td>';
echo '<td>' . get_field('ligging', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Beschikbaarheid:</td>';
echo '<td>' . get_field('beschikbaarheid', get_the_ID()) . '</td>';
echo '</tr>';
echo '</table>';

echo '<table class="kenmerken-tabel">';
echo '<tr>';
echo '<td>Bedrijfsoppervlakte:</td>';
echo '<td>' . get_field('bedrijfsoppervlakte', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Bruto vloeroppervlakte:</td>';
echo '<td>' . get_field('bruto_vloeroppervlakte', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Totaal BVO</td>';
echo '<td>' . get_field('totaal_bvo', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>VVO m2:</td>';
echo '<td>' . get_field('vvo_m2', get_the_ID()) . '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>VVO Kantoor</td>';
echo '<td>' . get_field('vvo_kantoor', get_the_ID()) . '</td>';
echo '</tr>';
echo '</table>';
echo '</div>';

/* MEER KENMERKEN*/
if (!empty($more_details)) {
  echo '<button class="btn btn-green meer-kenmerken-btn">Meer details</button>';
  echo '<div class="meer-kenmerken-tabel">';
  echo '<div class="h4_block">';
  echo '<div class="h4_container">';
  echo '<h4 class="aanverhuur-kenmerken-titel">Meer kenmerken</h4>';
  echo '</div>';
  echo '</div>';
  echo '<table class="kenmerken-tabel kenmerken-tabel2">';
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
echo '<div class="aanverhuur-omschrijving">';
echo '<div class="h4_block">';
echo '<div class="h4_container">';
echo '<h4 class="aanverhuur-kenmerken-titel">Omschrijving van het object</h4>';
echo '</div>';
echo '</div>';
echo '<div class="meer-omschrijving">' . get_field('omschrijving', get_the_ID()) . '</div>';
echo '<button class="btn btn-green big meer-omschrijving-btn">Meer kenmerken</button>';

/* OMSCHRIJVING MEER*/
echo '<div class="meer-omschrijving-container">' . get_field('omschrijving_meer', get_the_ID()) . '</div>';
echo '</div>';

/* CONTACT*/
echo '<div class="aanverhuur-contact">';
echo '<a href="#the_ID" data-ps2id="true" class="ps2id">';
echo '<button class="btn btn-green big bezichtigings-btn-btn">';
echo '<div class="h4_block">';
echo '<div class="h4_container">';
echo '<h4 class="bezichtigings-btn">';
echo 'Deze ruimte komen <br> bezichtigen';
echo '</h4>';
echo '</div>';
echo '</div>';
echo '<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><br>';
echo '<h3><b>bezichtiging plannen</b></h3>';
echo '</button>';
echo '</a>';
echo '<div class="socialShareIcons">';
echo 'Zelf delen?';
echo '</br>';
echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
echo '</div>';
echo '</div>';
echo '</div>';

$args1 = array(
  'numberposts' => 3,
  'offset' => 0,
  'category' => get_the_category()[0]->cat_ID,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'include' => '',
  'exclude' => '',
  'meta_key' => '',
  'meta_value' =>'',
  'post_type' => 'post',
  'post_status' => 'draft, publish, future, pending, private',
  'suppress_filters' => true
);

echo '<div class="other_aanverhuur_container">';

echo '<div class="other_stories">';
echo '<div class="h4_block">';
echo '<div class="h4_container">';
echo '<h4 class="underlineGreen">';
echo get_field('soortgelijk_aanbod_titel', 2138);
echo '</div>';
echo '</div>';
echo '</h4>';
echo get_field('soortgelijk_aanbod_tekst', 2138);
echo '</div>';

echo '<div class="meerAanbodVerhuurContainer">';
for ($x = 0; $x <= count(wp_get_recent_posts( $args1, ARRAY_A )).length - 1; $x++) {
  echo '<a href="' . get_permalink(wp_get_recent_posts( $args1, ARRAY_A )[$x]['ID']) . '">';
  echo '<div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 story_preview_story hoverovereffect">';
  echo '<div class="story_preview_container">';
  echo '<div class="story_preview_image">';
  echo '<img class="story_thumbnail" src="' . get_field('afbeelding', wp_get_recent_posts( $args1, ARRAY_A )[$x]['ID']) . '"/>';
  echo '</div>';
  echo '<div class="story_preview_text">';
  echo '<div class="story_preview_text_container">';
  echo '<div class="h4_block">';
  echo '<div class="h4_container">';
  echo '<h4 class="green underlineGreen">';
  echo wp_get_recent_posts( $args1, ARRAY_A )[$x]['post_title'];
  echo '</h4>';
  echo '<br/>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
};
echo '</div>';
echo '<div class="meerAanbodVerhuur">';
echo '<p class="meerAanbodVerhuurText">' . get_field('soortgelijk_aanbod_btn_txt', 2138) . '</p>';
echo '<a href="' . get_site_url() . '/aan-verhuur' . '">';
echo '<button class="btn btn-green btn-primary whiteBlue">' . get_field('soortgelijk_aanbod_btn_txt2', 2138) . '</button>';
echo '</a>';
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
?>

<?php get_template_part("contact", "page"); ?>
