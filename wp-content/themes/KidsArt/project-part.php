<div class="storiesWhite">
  <?php
  $cat = get_field('categorie', get_the_ID());
  if ($cat == 25 || $cat == 38) {
    get_template_part("aanverhuur", "post");
  } else
    get_template_part("project", "post");
  ?>
</div>
