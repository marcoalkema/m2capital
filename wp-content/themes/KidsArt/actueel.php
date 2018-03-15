<?php
/*
   Template Name: Actueel Template
 */

get_header(); ?>

<div class="actueel-container">
    <div class="h4_block">
	<div class="h4_container">
	    <h4 class="green underlineGreen">
		<?php
		if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
		    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1939 : 1962;
		    printf(get_field('actueel_title', $ID));
		};
		?></h4>
	</div>
    </div>
    <p>
	<?php
	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
	    $ID = (ICL_LANGUAGE_CODE == 'nl') ? 1939 : 1962;
	    printf(get_field('actueel_text', $ID));
	};
	?>
    </p>
</div>


<?php get_footer(); ?>
