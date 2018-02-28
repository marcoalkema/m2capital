<?php /* Template Name: tarieven-template */ ?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("main-header"); ?>" class="headerImg"/>
      <!-- <div class="page-title-container">
           <div class="page-title-div">
           <div class="page-title-background"></div>
           <h1 id="page-title-<?php the_ID(); ?>" class="template-page-title"><?php printf(get_field('main-title', get_the_ID())); ?></h1>
           </div>
           </div> -->
    </div>
    <div class="template-page-content">
      <div class="tarieven_algemeen">
        <div class="tarieven-intro">
          <?php printf(get_field('main-text', get_the_ID())); ?>
        </div>

        <?php
        $arr = get_field('fees-repeater', get_the_ID());

        foreach($arr as $val) {
          $ratesArray = $val['fees-table'];
          $length = count($ratesArray['body']);
          $ratesHTML = '<table class="fees_table">';

          for ($x = 0; $x < $length; $x++) {
            $ratesHTML = $ratesHTML .
                         '<tr>
                    <td>' . ($ratesArray['body'][$x][0]['c']) . '</td>
                    <td>' . ($ratesArray['body'][$x][1]['c']) . '</td>
                    <td>' . ($ratesArray['body'][$x][2]['c']) . '</td>
                  </tr>';
          }
          echo '<div class="tarieven_container">';
          echo '<div class="h4_block"><div class="h4_container"><h4 class="green underlineGreen">';
          echo $val['fees-header'];
          echo '</h4></div></div>';
          echo $val['fees-text'];
          echo '<div class="fees_table_container">';
          echo $ratesHTML . '</table>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
</article>

<?php get_template_part("contact", "page"); ?>

<?php get_footer(); ?>
