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
          <div class="upper-footer">
            <div class="contact-info-container">
              <?php do_shortcode('[my_contact_field]'); ?>
            </div>
            <div>
              Zaken doen?<br>
              <button>Neem contact</button>
            </div>
            <div>
              Volg ons op<br>
              <div class="linkedin-icon">
                <a href="<?php the_field('linkedin_link', 5) ?>" target="_blank">
                  <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/linkedIn.svg" height="25" width="25" class="img-responsive"/>
                </a>
              </div>
            </div>
            <div>
              FUNDA
            </div>
          </div>
          <div class="lower-footer">
            <div class="footer-link-container">
              <?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
            </div>
            <div class="social_icons_primary secondary_menu_icons">

            </div>
          </div>
	</footer>
        </div>
        <?php wp_footer(); ?>
</body>
</html>
