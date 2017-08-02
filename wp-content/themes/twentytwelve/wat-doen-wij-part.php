<div class="wat-doen-wij-container">
  <div class="row">
    <?php if(get_field('activiteiten')[0]['activiteit'] != ''): ?>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[0]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[0]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[0]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(get_field('activiteiten')[1]['activiteit'] != ''): ?>
    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[1]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[1]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[1]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(get_field('activiteiten')[2]['activiteit'] != ''): ?>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[2]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[2]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[2]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="row">
    <?php if(get_field('activiteiten')[3]['activiteit'] != ''): ?>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[3]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[3]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[3]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(get_field('activiteiten')[4]['activiteit'] != ''): ?>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[4]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[4]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[4]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(get_field('activiteiten')[5]['activiteit'] != ''): ?>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo get_field('activiteiten', 132)[5]['afbeelding']?>" alt="">
          <div class="card-block">
            <h4 class="card-title">
              <?php echo get_field('activiteiten', 132)[5]['activiteit']?>
            </h4>
            <p class="card-text">
              <?php echo get_field('activiteiten', 132)[5]['omschrijving']?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
