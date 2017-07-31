<?php /* Template Name: kwaliteit-template */ ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div id="kwaliteit-page">
      <h1>Kwaliteit</h1>
      <div class="row">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
      <div class="row">
        <img src="the_field('kwaliteit-text')" height="200" width="200" class="center-block">
      </div>
      <p>
        <?php
        echo the_field("kwaliteit-text");
        ?>
      </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <img src="the_field('kwaliteit-text')" height="200" width="200" class="center-block">
          <p>
            <?php
            echo the_field("kwaliteit-text");
            ?>
          </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <img src="the_field('kwaliteit-text')" height="200" width="200" class="center-block">
          <p>
            <?php
            echo the_field("kwaliteit-text");
            ?>
          </p>
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
          <img src="the_field('kwaliteit-text')" height="200" width="200" class="center-block">
          <p>
            <?php
            echo the_field("kwaliteit-text");
            ?>
          </p>
        </div>
      </div>
    </div>
  </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
