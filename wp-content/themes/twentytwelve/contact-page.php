<?php /* Template Name: wat_doen_wij-template */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div id="wat-doen-wij-uitgebreid">
      <div class="row">
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
	  <img src="<?php echo get_field('wat_doen_wij_uitgebreid-image')?>" height="200" width="200"/>
        </div>
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
          <p>
            <?php
            echo the_field("wat_doen_wij_uitgebreid-text", 110);
            ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
          <button type="button" class="btn btn-secondary">Over ons</button>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
          <button type="button" class="btn btn-secondary">Tarieven</button>
        </div>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>
