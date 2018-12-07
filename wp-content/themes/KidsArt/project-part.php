<div class="storiesWhite">
  <?php
  if (get_field('categorie', get_the_ID()) == 25 || get_field('categorie', get_the_ID()) == 38) {
    get_template_part("aanverhuur", "post");
  } else
    get_template_part("project", "post");
  ?>
</div>
