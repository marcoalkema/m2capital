<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
          <div class="footer-link-container">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
          </div>
          <div class="social_icons_primary secondary_menu_icons">
            <div class="maps-icon">
              <a href="<?php
                       if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
                         if ( ICL_LANGUAGE_CODE == 'nl' ) {
                           echo get_home_url() . '/about/#waar_ben_ik';
                         } else {
                           echo '/about/?lang=en/#waar_ben_ik';
                         };
                       };
                       ?>">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/GM.svg" height="28" width="28" class="img-responsive"/>
              </a>
            </div>

            <div class="facebook-icon">
              <a href="http://<?php the_field('facebook-link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/FB.svg" height="25" width="25" class="img-responsive"/>
              </a>
            </div>
            <div class="youtube-icon">
              <a href="http://<?php the_field('youtube_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/YT.svg" height="25" width="25" class="img-responsive"/>
              </a>
            </div>
            <div class="instagram-icon">
              <a href="http://<?php the_field('instagram_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/IG.svg" height="25" width="25" class="img-responsive"/>
              </a>
            </div>
            <div class="linkedin-icon">
              <a href="<?php the_field('linkedin_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/linkedIn.svg" height="25" width="25" class="img-responsive"/>
              </a>
            </div>
          </div>
	</footer>
        </div>
        <?php wp_footer(); ?>
</body>
</html>
