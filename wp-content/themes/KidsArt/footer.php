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
            <div class="footer-link merriweather zaken-doen">
              <p>
                <?php
                echo (ICL_LANGUAGE_CODE == 'nl') ? 'Zaken doen?' : 'Do business?';
                ?><br>
              </p>
              <a href="mailto:<?php printf(get_field('mail_address', 5));?>">
                <button class="footer-contact-btn">                <?php
                                                                   echo (ICL_LANGUAGE_CODE == 'nl') ? 'Neem contact' : 'Contact us';
                                                                   ?></button>
              </a>
            </div>
            <div class="footer-link merriweather">
              <p>
                <?php
                echo (ICL_LANGUAGE_CODE == 'nl') ? 'Volg ons op?' : 'Follow us';
                ?><br>
              </p>
              <div class="linkedin-icon">
                <a href="http://<?php the_field('linkedin_link', 5) ?>" target="_blank">
                  <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/linkedInGrey.png" height="40" width="40" class="img-responsive linkedInBtn"/>
                </a>
              </div>
            </div>
            <div class="footer-link">
              <a href="http://<?php the_field('youtube_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/fundaBusiness.svg" height="120" width="120" class="img-responsive"/>
              </a>
            </div>
          </div>
          <div class="lower-footer">
            <div class="copyright-text">
              copyright by M2Capital 2018 ©
            </div>
            <div class="footer-link-container">
              <?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
            </div>
          </div>
	</footer>
        </div>
        <?php wp_footer(); ?>
</body>
</html>
