<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
  <html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
  <html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <meta name="format-detection" content="telephone=no">
    <staticContent>
      <mimeMap fileExtension=".ttf" mimeType="font/ttf" />
    </staticContent>
    <title><?php wp_title( 'Stepping forward', true, 'right' ); ?></title>
    <script src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/js/html5.js" type="text/javascript"></script>
    <link href="./wp-content/themes/KidsArt/fonts/AramCapsITCStd.ttf"/>
    <div style="color: white"><?php wp_head(); ?></div>
  </head>

  <body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
      <header id="masthead" class="site-header" role="banner">

        <nav id="site-navigation" class="main-navigation" role="navigation"><link rel="icon" href="http://www.wpbeginner.com/favicon.png" type="image/x-icon" />

          <div id="header-info">
            <div id="header-logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo the_field("main-logo", 5)?>" height="95" class="site-logo"/>
              </a>
            </div>
          </div>

          <h3 class="menu-toggle"><?php _e( '', 'twentytwelve' ); ?>
            <button class="menu-toggle" type="submit" style="border: 0; background: transparent">
              <img src="<?php echo get_template_directory_uri() ?>/../../themes/KidsArt/images/hamburger.svg" width="40" height="40" alt="menu" />
            </button>
          </h3>

          <?php get_home_url() ?>

          <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>

          <div class="social_icons_primary">
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
                  <img src="<?php echo get_template_directory_uri() ?>/../..//uploads/2017/11/SF-assets-06-black.png" height="25" width="25" class="img-responsive"/>
              </a>
            </div>

            <div class="facebook-icon">
              <a href="<?php the_field('facebook-link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../..//uploads/2017/12/SF-assets-09-black.png" height="21" width="21" class="img-responsive"/>
              </a>
            </div>
            <div class="youtube-icon">
              <a href="<?php the_field('youtube_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../uploads/2017/12/SF-assets-10-black.png" height="21" width="21" class="img-responsive"/>
              </a>
            </div>
            <div class="instagram-icon">
              <a href="<?php the_field('instagram_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../../uploads/2017/12/SF-assets-11-black.png" height="21" width="21" class="img-responsive"/>
              </a>
            </div>
            <div class="linkedin-icon">
              <a href="<?php the_field('linkedin_link', 5) ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/../..//uploads/2018/02/SF-linkedin-black.png" height="21" width="21" class="img-responsive"/>
              </a>
            </div>
          </div>
        </nav><!-- #site-navigation -->

      </header><!-- #masthead -->

      <div id="main" class="wrapper">
