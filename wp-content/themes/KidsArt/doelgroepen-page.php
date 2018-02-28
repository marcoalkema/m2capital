<?php
/*
   Template Name: doelgroepen-template
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page centerBtns" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("header_image"); ?>" class="headerImg"/>
    </div>
    <div class="template-page-content">
      <div -<?php the_ID(); ?>" class="main-text">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('introduction_title', get_the_ID())); ?>
            </h4>
          </div>
        </div>
        <p>
          <?php printf(get_field('introduction_text', get_the_ID())); ?>
        </p>
      </div>

      <?php
      $arr = get_field('group-repeater', get_the_ID());
      $i = 2;

      foreach($arr as $val) {
        $class = ($i % 2 === 0) ? " textWhite has-background" : "" ;
        $btn = ($i % 2 === 0) ? "btn-white" : "btn-green";

        echo "<div class='group-text" . $class . "'>";
        echo "<div class='group_container'>";
        echo "<p>";
        echo $val['group_text'];
        echo "</p>";
        echo "<a href='" . $val['group_button_link']. "'";
        echo "<button class='btn " . $btn . "'>";
        echo $val['group_button_text'];
        echo "</button>";
        echo "</a>";
        echo "</div>";
        echo "</div>";

        $i++;
      }
      ?>


  </div>
  <?php get_template_part("contact", "page"); ?>
  </div>
</article>

<?php get_footer(); ?>
