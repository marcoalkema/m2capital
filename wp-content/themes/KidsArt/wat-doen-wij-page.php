<?php
/*
   Template Name: WAT-DOEN-WIJ-TEMPLATE-PAGE
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("wat-doen-wij-img", get_the_ID()); ?>" class="headerImg"/>
      <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('wat-doen-wij-img', get_the_ID())); ?></h6>
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php
              if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                $ID = (ICL_LANGUAGE_CODE == 'nl') ? 17 : 1;
                printf(get_field('wat-doen-wij-title', $ID));
              }
              ?>
            </h4>
          </div>
        </div>
      </div>

      <div id="title_text-<?php the_ID(); ?>" class="title_text">
        <p>
          <?php
          if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $ID = (ICL_LANGUAGE_CODE == 'nl') ? 17 : 1;
            printf(get_field('wat-doen-wij-text', $ID));
          }
          ?>
        </p>
      </div>

      <div class="">
        <?php
        $ID = (ICL_LANGUAGE_CODE == 'nl') ? 17 : 1;
        $arr = get_field('activiteiten', $ID);
        $i = 0;
        $row = 1;
        foreach($arr as $val) {

          if ($i % 4 == 0) {
            echo '<div class="row">';
            echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
            echo '<img class="network-image" src="' . $val['img'] . '"/>';
            echo '<h4>' . $val['title'] . '</h4>';
            echo '<p>' . $val['text'] . '</p>';
            echo '<a target="_blank" href="' . $val['link'] . '">';
            echo '</a>';
            echo '</div>';
          } else {
            echo '<div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 network-col">';
            echo '<img class="network-image" src="' . $val['img'] . '"/>';
            echo '<h4>' . $val['title'] . '</h4>';
            echo '<p>' . $val['text'] . '</p>';
            echo '<a target="_blank" href="' . $val['link'] . '">';
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

      <div id="asset-management">
        <?php get_template_part("asset-management", "part"); ?>
      </div>

      <div id="her-ontwikkel">
        <?php get_template_part("herontwikkel", "part"); ?>
      </div>

      <div id="beleggingsadvies">
        <?php get_template_part("beleggingsadvies", "part"); ?>
      </div>

      <div id="aan-verhuur">
        <?php get_template_part("aanverhuur", "part"); ?>
      </div>

      <?php get_template_part("contact", "page"); ?>
    </div>
</article>

<?php get_footer(); ?>