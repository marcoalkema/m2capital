<?php /* Template Name: over_ons-template */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div id="wat-doen-wij-uitgebreid">
      <div class="row">
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
	  <img src="<?php echo get_field('wat_doen_wij_uitgebreid-image')?>" height="200" width="200"/>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
          <h1>Over ons</h1>
          <p>
            <?php
            echo the_field("wat_doen_wij_uitgebreid-text", 110);
            ?>
          </p>
        </div>
      </div>
    </div>
  </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
