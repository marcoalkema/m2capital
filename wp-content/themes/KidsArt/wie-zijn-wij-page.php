<?php
/*
   Template Name: WIE-ZIJN-WIJ-TEMPLATE-PAGE
 */


get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <div class="blue-image-filter">
        <img src="<?php the_field("template-image"); ?>" class="headerImg"/>
      </div>
      <div class="page-title-div">
        <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('main-title', get_the_ID())); ?></h6>
      </div>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('wie-zijn-wij-title', get_the_ID())); ?>
            </h4>
          </div>
        </div>
      </div>
      <div id="title_text-<?php the_ID(); ?>" class="title_text">
        <p>
          <?php printf(get_field('wie-zijn-wij-tekst', get_the_ID())); ?>
        </p>
      </div>
      <div class="table m2_btn_table">
        <div class="row">
          <div class="col-sm-4">
              <div class="btn-group-vertical">
                  <a href="#wie-zijn-wij-visie" data-ps2id="true" class="ps2id">
                      <div class="m2BtnImage">
                        <img src="<?php printf(get_field('image_btn', get_the_ID())); ?>"/>
                      </div>
                      <button type="button" class="btn btn-primary btn_text_m2">
                          Onze Visie
                      </button>
                  </a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="btn-group-vertical">

              <a href="#wie-zijn-wij-werkwijze" data-ps2id="true" class="ps2id">
                  <div class="m2BtnImage">
                    <img src="<?php printf(get_field('image_btn', get_the_ID())); ?>"/>
                  </div>
                  <button type="button" class="btn btn-primary btn_text_m2">
                      Werkwijze
                  </button>
              </a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="btn-group-vertical">

              <a href="#over-ons" data-ps2id="true" class="ps2id">
                <div class="m2BtnImage">
                  <img src="<?php printf(get_field('image_btn', get_the_ID())); ?>"/>
                  </div>
                  <button type="button" class="btn btn-primary btn_text_m2">
                      Over ons
                  </button>
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="visie">
    <div class="actueel-intro-container-img">
      <img src="<?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 613 : 1;
                  printf(get_field('visie-img', $ID));
                }?>" class="visie-img light-blue-image-filter"/>
    </div>

    <div id="wie-zijn-wij-visie" class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 613 : 1;
            printf(get_field('visie-title', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 613 : 1;
        printf(get_field('visie-text', $ID));
      }
      ?>
    </div>
  </div>

  <div id="wie-zijn-wij-werkwijze" class="werkwijze">
    <div id="wie-zijn-wij-visie" class="h4_block">
      <div class="h4_container">
        <h4 class="green underlineGreen">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 634 : 1;
            printf(get_field('werkwijze-title', $ID));
          }
          ?>
        </h4>
      </div>
    </div>
    <div>
      <?php
      if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 634 : 1;
        printf(get_field('werkwijze-text', $ID));
      }
      ?>
    </div>
    <div style="display: <?php
                         $ID = (ICL_LANGUAGE_CODE == 'nl') ? 634 : 1;
                         $shouldDisplay = get_field('werkwijze-contact-on', $ID);
                         $display = ($shouldDisplay == true) ? 'block' : 'none';
                         printf($display);
                         ?>">

      <div class="h4_block">
        <div class="h4_container">
          <h4 class="green underlineGreen smalleUnderline">
            <?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 634 : 1;
              printf(get_field('werkwijze-contact-header', $ID));
            }
            ?>
          </h4>
        </div>

        <div class="grijs">
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 634 : 1;
            printf(get_field('werkwijze-contact-text', $ID));
          }
          ?>
        </div>
        <a href="#contact" data-ps2id="true" class="ps2id">
          <button class="btn btn-green margin_btn bezichtigings-btn-btn">Contact</button>
        </a>
      </div>
    </div>

    <div id="wie-zijn-wij-wie" class="wie">
      <div class="actueel-intro-container-img">
      <img src="<?php
                if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                  $ID = (ICL_LANGUAGE_CODE == 'nl') ? 632 : 1;
                  printf(get_field('over-ons-img', $ID));
                }?>" class="over-ons-img light-blue-image-filter"/>
      </div>
      <div id="wie-zijn-wij-visie" class="h4_block">
        <div id="over-ons" class="h4_container">
          <h4 class="green underlineGreen">
            <?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 632 : 1;
              printf(get_field('over-ons-title', $ID));
            }
            ?>
          </h4>
        </div>
      </div>
      <div class="wie-zijn-wij-wie-text-container">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 632 : 1;
          printf(get_field('over-ons-text', $ID));
        }
        ?>
      </div>

      <?php
      $ID = (ICL_LANGUAGE_CODE == 'nl') ? 632 : 1;
      $arr = get_field('over-ons-profielen', $ID);
      $i = 0;
      $row = 1;
      foreach($arr as $val) {

        if ($i % 2 == 0) {
          echo '<div class="container">';
          echo '<div class="row">';
          echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 wie-foto-container">';
          echo '<div class="wrapper">';
          echo '<div class="wie-foto"><img class="introduction-links-image wie-foto-mark" src="' . $val['foto'] . '"/>';
          echo '<h4 class="green underlineGreen lijn">' . $val['naam'] . '</h4>';
          echo '<div>' . $val['omschrijving'] . '</div>';
          echo '<button type="button" class="btn btn-primary m2btn">';
          echo '<a href="' . $val['linkedin-url'] . '" target="_blank">';
          echo '<img src="http://localhost:8888/wp-content/uploads/2017/07/Linked-in_B-01.png" class="m2btn_image" />';
          echo '</a>';
          echo '</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        } else {
          echo '<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 wie-foto-container">';
          echo '<div class="wrapper">';
          echo '<div class="wie-foto"><img class="introduction-links-image wie-foto-michiel" src="' . $val['foto'] . '"/>';
          echo '<h4 class="green underlineGreen lijn">' . $val['naam'] . '</h4>';
          echo '<div>' . $val['omschrijving'] . '</div>';
          echo '<button type="button" class="btn btn-primary m2btn">';
          echo '<a href="' . $val['linkedin-url'] . '" target="_blank">';
          echo '<img src="http://localhost:8888/wp-content/uploads/2017/07/Linked-in_B-01.png" class="m2btn_image" />';
          echo '</a>';
          echo '</button>';
          echo '</div>';
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

    <div class="partners">
      <div id="wie-zijn-wij-visie" class="h4_block">
        <div class="h4_container">
          <h4 class="green underlineGreen">
            <?php
            if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
              $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1675 : 1;
              printf(get_field('partners-title', $ID));
            }
            ?>
          </h4>
        </div>
      </div>
      <div class="wie-zijn-wij-wie-text-container">
        <?php
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1675 : 1;
          printf(get_field('partners-text', $ID));
        }
        ?>
      </div>
      <div class="partner-profiles">
          <?php
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1675 : 1;
          $arr = get_field('partners-profiles', $ID);
          $i = 0;
          $row = 5;
          echo '<div class="row">';
          foreach($arr as $val) {
                  echo '<div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-3 partner-profiles-img">';
                  echo '<a href="' . $val['link'] . '" target="blank">';
                  echo '<img src="' . $val['img'] . '"/>';
                  echo '</a>';
                  echo '</div>';
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

  </div>
  <?php get_template_part("contact", "page"); ?>
  </div>
</article>

<?php get_footer(); ?>
