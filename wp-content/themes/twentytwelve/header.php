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
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
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
   <img src="/../wp-content/uploads/2017/07/menu-icon.png" width="50" height="28" alt="submit" />
   </button>
   </h3>

   <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
   <div class="facebook-icon">
     <img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" height="30" width="30"/>
   </div>
   </nav><!-- #site-navigation -->

   </header><!-- #masthead -->

   <div id="main" class="wrapper">
