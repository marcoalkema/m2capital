<?php
/*
   Template Name: AANBOD-TEMPLATE-PAGE
 */


get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content template-page" id="page-<?php the_ID(); ?>">
    <div class="page-header-image">
      <img src="<?php the_field("template-image"); ?>" class="headerImg"/>
      <!-- <div class="page-title-container">
           <div class="page-title-div aanbod-title-div">
           <div class="page-title-background"></div>
           <h6 id="landing-overlay-title" class="white landing-title"><?php printf(get_field('main-title', get_the_ID())); ?></h6>
           </div>
           </div> -->
    </div>
    <div class="template-page-content">
      <div id="main-title-<?php the_ID(); ?>" class="main-title">
        <div class="h4_block">
          <div class="h4_container">
            <h4 class="green underlineGreen">
              <?php printf(get_field('template-introduction-header', get_the_ID())); ?>
            </h4>
          </div>
        </div>
      </div>

      <div id="title_text-<?php the_ID(); ?>" class="title_text">
        <p>
          <?php printf(get_field('template-introduction-text', get_the_ID())); ?>
        </p>
      </div>

      <div id="main-text-<?php the_ID(); ?>" class="main-text aanbod-template-text">
        <p>
          <?php printf(get_field('examples-text', get_the_ID())); ?>
        </p>
      </div>
    </div>
    <div class="offers-more-info">
      <?php get_template_part("compact-contact", "page"); ?>
    </div>
    <script>
     var category = <?php echo get_the_category()[0]->cat_ID ?>;
     console.log(category)
     if (category === 12 ||
         category === 13 ||
         category === 17 ||
         category === 14
     ) {
       document.getElementById('menu-item-1556').style.borderBottom = '2px solid white'
       document.getElementById('menu-item-1555').style.borderBottom = '2px solid white'
     }
    </script>
  </div>
</article>

<?php get_footer(); ?>
