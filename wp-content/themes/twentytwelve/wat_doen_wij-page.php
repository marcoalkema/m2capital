<?php /* Template Name: wat_doen_wij-template */ ?>

<?php get_header(); ?>

<div id="wat-doen-wij-uitgebreid">
  <p>
   <?php echo the_field("wat_doen_wij_uitgebreid-text");?>
  </p>
  <div class="row">
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
      <button type="button" class="btn btn-secondary"><a href="http://localhost:8888/over-ons/">Over ons</a></button>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">

      <button type="button" class="btn btn-secondary">
        <a href="http://localhost:8888/tarieven/">Tarieven</a></button>
    </div>
  </div>
</div>

   <?php get_footer(); ?>
