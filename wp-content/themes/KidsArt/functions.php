<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
  $content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */

add_filter('show_admin_bar', '__return_false');

function twentytwelve_setup() {
  /*
   * Makes Twenty Twelve available for translation.
   *
   * Translations can be added to the /languages/ directory.
   * If you're building a theme based on Twenty Twelve, use a find and replace
   * to change 'twentytwelve' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  // This theme supports a variety of post formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

  // This theme uses wp_nav_menu() in one location.
  function register_my_menus() {
    register_nav_menus(
      array(
        'primary' => __( 'Primary' ),
        'secondary' => __( 'Secondary' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );



  /*
   * This theme supports custom background color and image,
   * and here we also set up the default background color.
   */
  add_theme_support( 'custom-background', array(
    'default-color' => 'e6e6e6',
  ) );

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}

add_action( 'after_setup_theme', 'twentytwelve_setup' );

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Disable WP Members Select2 assets on WPCA pages
 */
function custom_cuar_wp_members_compatibility() {
  if (  cuar_is_customer_area_page( get_queried_object_id() )   ||  cuar_is_customer_area_private_content(
    get_the_ID() ) )
  {
    wp_dequeue_script('select2');
    wp_dequeue_style('select2css');
  }
}
add_action( 'admin_enqueue_scripts', 'custom_cuar_wp_members_compatibility', 99 );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
  global $wp_styles;

  /*
   * Adds JavaScript to pages with the comment form to support
   * sites with threaded comments (when in use).
   */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  // Loads our main stylesheet.
  wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
  wp_enqueue_style( 'marco_css', get_template_directory_uri() . '/css/marco.css' );

  wp_enqueue_script( 'utils_js', get_template_directory_uri() . '/js/utils.js' );
  wp_enqueue_script( 'navigation_js', get_template_directory_uri() . '/js/navigation.js' );


  // Loads the Internet Explorer specific stylesheet.
  wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
  $wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
  $font_url = twentytwelve_get_font_url();

  if ( empty( $font_url ) )
    return $mce_css;

  if ( ! empty( $mce_css ) )
    $mce_css .= ',';

  $mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

  return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );



/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */

function my_login_logo() { ?>
  <style type="text/css">
   @font-face {
     font-family: MetaPlusNormal;
     src: url(<?php echo get_stylesheet_directory_uri(); ?>/fonts/MetaPlusNormal-Roman.otf);
     font-weight: 200;
   }

   @font-face {
     font-family: MerriweatherRegular;
     src: url(<?php echo get_stylesheet_directory_uri(); ?>/fonts/Merriweather-Regular.otf);
     font-weight: 200;
   }

   #login {
     margin-top: 40px!important;
     color: #fff;
     font-family: "MetaPlusNormal"!important;
     font-size: 24px;
     text-align: center;
     padding-top: 0!important;
   }

   #loginform {
     background: #4080bf!important;
     margin-top: 20px!important;
     box-shadow: none;
   }
   #login h1 {
     position: relative!important;
   }

   #login h1:after {
     content: "";
     position: absolute;
     left: 50%;
     margin-left: -25.5%;
     bottom: -64px;
     margin-bottom: -5px;
     width: 51%;
     border-bottom: 4px solid #fff;
   }

   .message {
     display: none!important;
   }

   #login h1 a, .login h1 a {
     background-image: none;
     filter: brightness(0) invert(1);
     height: 1px;
     width: 100%;
     background-size: 320px 65px;
     background-repeat: no-repeat;
     padding-bottom: 30px;
   }
   .login-action-login:before {
     font-family: "MerriweatherRegular"!important;
     display: block;
     content: "your code please";
     height: 300px;
     width: 100%;
     background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login.jpg);
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
     font-size: 7vw;
     text-align: center;
     color: white;
     line-height: 300px;
   }
   /* .login-action-login:before {
      position: absolute;
      top: 20vw;
      left: 0;
      right: 0;
      display: block;
      content: "Your code please";
      height: 300px;
      width: 100%;
      } */
   #login h1 a:after {
     display: block;
     height: 50px;
     width: 100%;
     content: "Inloggen bij M2Capital"
   }
   .login-action-login {
     background: #4080bf!important;
   }
   .forgetmenot label,
   .login-action-login p a {
     font-family: "MetaPlusNormal"!important;
     color: #fff!important;
   }

   #user_login,
   #user_pass{
     font-family: "MetaPlusNormal"!important;
     font-size: 18px!important;
     padding: 5px;
   }

   #wp-submit {
     font-family: "MetaPlusNormal"!important;
     color: #4080bf!important;
     background: #fff!important;
     text-shadow: none;
   }
  </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'my_login_logo' );

  function custom_login_message() {
    $message = "Inloggen bij M2Capital";
    return $message;
  }
  add_filter('login_message', 'custom_login_message');

function twentytwelve_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name', 'display' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
  if ( ! isset( $args['show_home'] ) )
    $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'twentytwelve' ),
    'id' => 'sidebar-1',
    'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
    'id' => 'sidebar-2',
    'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
    'id' => 'sidebar-3',
    'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
                   /**
                    * Displays navigation to next/previous pages when applicable.
                    *
                    * @since Twenty Twelve 1.0
                    */
                   function twentytwelve_content_nav( $html_id ) {
                     global $wp_query;

                     $html_id = esc_attr( $html_id );

                     if ( $wp_query->max_num_pages > 1 ) : ?>
  <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
    <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
  </nav><!-- #<?php echo $html_id; ?> .navigation -->
                                                                                                                                                                                                                                                                                                                                                                                                      <?php endif;
                                                                                                                                                                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                                                                                                                                                                      endif;

                                                                                                                                                                                                                                                                                                                                                                                                      if ( ! function_exists( 'twentytwelve_comment' ) ) :
  /**
   * Template for comments and pingbacks.
   *
   * To override this walker in a child theme without modifying the comments template
   * simply create your own twentytwelve_comment(), and that function will be used instead.
   *
   * Used as a callback by wp_list_comments() for displaying the comments.
   *
   * @since Twenty Twelve 1.0
   */
  function twentytwelve_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
      // Display trackbacks differently than normal comments.
      ?>
      <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                                      <p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
                                                                                                                                                                                                                             <?php
                                                                                                                                                                                                                             break;
  default :
    // Proceed with normal comments.
    global $post;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                                    <header class="comment-meta comment-author vcard">
                                    <?php
                                    echo get_avatar( $comment, 44 );
    printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
            get_comment_author_link(),
            // If current post author is also comment author, make it known visually.
            ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
            );
    printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            /* translators: 1: date, 2: time */
            sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
            );
    ?>
    </header><!-- .comment-meta -->

        <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
                                                                                                                         <?php endif; ?>

                                                                                                                         <section class="comment-content comment">
                                                                                                                         <?php comment_text(); ?>
                                                                                                                         <?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
                                                                                                                         </section><!-- .comment-content -->

                                                                                                                         <div class="reply">
                                                                                                                         <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                                                                                                         </div><!-- .reply -->
                                                                                                                         </article><!-- #comment-## -->
                                                                                                                         <?php
                                                                                                                         break;
    endswitch; // end comment_type check
  }
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
  /**
   * Set up post entry meta.
   *
   * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
   *
   * Create your own twentytwelve_entry_meta() to override in a child theme.
   *
   * @since Twenty Twelve 1.0
   */
  function twentytwelve_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

    $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
                     esc_url( get_permalink() ),
                     esc_attr( get_the_time() ),
                     esc_attr( get_the_date( 'c' ) ),
                     esc_html( get_the_date() )
                     );

    $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
                       esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                       esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
                       get_the_author()
                       );

    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
    if ( $tag_list ) {
      $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    } elseif ( $categories_list ) {
      $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    } else {
      $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    }

    printf(
           $utility_text,
           $categories_list,
           $tag_list,
           $date,
           $author
           );
  }
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. front page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. white or empty background color to change the layout and spacing.
 * 4. custom fonts enabled.
 * 5. single or multiple authors.
 *
 * @since twenty twelve 1.0
 *
 * @param array $classes existing class values.
 * @return array filtered class values.
 */
function twentytwelve_body_class( $classes ) {
  $background_color = get_background_color();
  $background_image = get_background_image();

  if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
    $classes[] = 'full-width';

  if ( is_page_template( 'page-templates/front-page.php' ) ) {
    $classes[] = 'template-front-page';
    if ( has_post_thumbnail() )
      $classes[] = 'has-post-thumbnail';
    if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
      $classes[] = 'two-sidebars';
  }

  if ( empty( $background_image ) ) {
    if ( empty( $background_color ) )
      $classes[] = 'custom-background-empty';
    elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
      $classes[] = 'custom-background-white';
  }

  // enable custom font class only if the font css is queued to load.
  if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
    $classes[] = 'custom-font-enabled';

  if ( ! is_multi_author() )
    $classes[] = 'single-author';

  return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * adjust content width in certain contexts.
 *
 * adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since twenty twelve 1.0
 */
function twentytwelve_content_width() {
  if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
    global $content_width;
    $content_width = 960;
  }
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * register postmessage support.
 *
 * add postmessage support for site title and description for the customizer.
 *
 * @since twenty twelve 1.0
 *
 * @param wp_customize_manager $wp_customize customizer object.
 */
function twentytwelve_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postmessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postmessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postmessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * enqueue javascript postmessage handlers for the customizer.
 *
 * binds js handlers to make the customizer preview reload changes asynchronously.
 *
 * @since twenty twelve 1.0
 */
function twentytwelve_customize_preview_js() {
  wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

if(get_page_by_title("home") == null)
  {
    $post = array(
                  "post_title" => "home",
                  "post_status" => "publish",
                  "post_type" => "page",
                  "menu_order" => "-100",
                  "page_template" => "single-page-theme.php"
                  );

    wp_insert_post($post);

    $home_page = get_page_by_title("home");
    update_option("page_on_front",$home_page->id);
    update_option("show_on_front","page");
  }

function new_nav_menu_items($items)
{
  $items = "";

  $args = array("post_type" => "page", "order" => "asc", "orderby" => "menu_order");
  $the_query = new wp_query($args);

  if($the_query->have_posts()):
    while($the_query->have_posts()):
      $the_query->the_post();
  $items .= '<li><a href="#post-'. get_the_id() .'">' . get_the_title() . '</a></li>';
  endwhile;
  else:
    echo "";
  endif;
  return $items;
}

/* add_filter("wp_nav_menu_items", "new_nav_menu_items"); */

//posts shortcode
function posts_callback($atts=null, $content=null)
{
  $args = array("post_type" => "post", "orderby" => "date", "order" => "DESC", "post_status" => "publish");
  $posts = new WP_Query($args);
  ?>
  <div style="text-align: center">
     <?php
     if($posts->have_posts()):
       while($posts->have_posts()):
         $posts->the_post();
  ?>
  <div style="display: inline-block; width: 300px; border-color: #333; border-style: solid; border-width: 2px; margin-top: 15px;">
     <a href="javascript:post_popup('<?php echo get_the_ID(); ?>')"><?php echo get_the_title(); ?></a>
                                                                                                      </div>
                                                                                                      <?php
                                                                                                      $post_array = array(get_the_title(), get_the_permalink(), get_the_date(), wp_get_attachment_url(get_post_thumbnail_id()));
  array_push($posts_array, $post_array);
  endwhile;
  else:
    echo "";
  die();
  endif;

  ?>
  </div>
      <?php
      }
      add_shortcode("posts", "posts_callback");

      /**
       * Tells WP Customer Area that select2 does not need to be enqueued.
       */
      function cuar_remove_select_library()
      {
	add_theme_support( 'customer-area.library.jquery.select2' );
      }
      add_action('after_setup_theme', 'cuar_remove_select_library', 99);


function mkGoogleMap () {
  $contactMap = get_field('contact_map', 19);
      echo '<iframe id="google-map" width="550" height="300" src="https://maps.google.it/maps?q='. $contactMap[address] .  '&output=embed" frameborder="0" style="border:2px solid black" allowfullscreen scrollwheel=false></iframe>';
}
add_shortcode('my_google_map', 'mkGoogleMap');

      function mkContactField () {
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
          $ID = (ICL_LANGUAGE_CODE == 'nl') ? 19 : 3169;
          $contactArray = get_field('contact_address', $ID)['body'];
          $address1 = $contactArray[0][1]['c'];
          $address2 = $contactArray[1][1]['c'];
          $phone = $contactArray[2][1]['c'];
          $mail = $contactArray[3][1]['c'];
          echo '<table class="contact-info">';
          echo '<tr><td>M2 Capital</td></tr>';
          echo '<tr><td>' . $phone. '</td><td>' . $address1 . '</td></tr>';
          echo '<tr><td><a class="mail-link" href="mailto: info@m2capital.nl">' . $mail . '</a></td><td>' . $address2 . '</td></tr>';
        };
      echo '</table>';
      }
add_shortcode('my_contact_field', 'mkContactField');

function mkRates () {
  $ratesArray = get_field('tarieven-table', get_option('page_for_posts'));
  $length = count($ratesArray['body']);
  $ratesHTML = '<table>';

  for ($x = 0; $x < $length; $x++) {
      /* $ratesHTML = $ratesHTML . '<tr><td>' . ($ratesArray['header'][$x]['c']) . '</td><td>' . ($ratesArray['body'][0][$x]['c']) . '</td></tr>';*/

      $ratesHTML = $ratesHTML . '<tr><td>' . ($ratesArray['body'][$x][0]['c']) . '</td><td>' . ($ratesArray['body'][$x][1]['c']) . '</td></tr>';
  }
  echo $ratesHTML . '</table>';
}
      add_shortcode('my_rates', 'mkRates');

      add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

      function mycustom_wpcf7_form_elements( $form ) {
        $form = do_shortcode( $form );

        return $form;
      }

      function cf7_add_post_id(){

        global $post;
        return $post->ID;
      }

      add_shortcode('CF7_ADD_POST_ID', 'cf7_add_post_id');

function post_content()
{
  $post_id = $_GET["post_id"];
  $content_post = get_post($post_id);
  $content = $content_post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  echo $content;

  die();
}

add_action("wp_ajax_post_content", "post_content");
add_action("wp_ajax_nopriv_post_content", "post_content");



/**
 * Enables a 'reverse' option for wp_nav_menu to reverse the order of menu
 * items. Usage:
 *
 *   wp_nav_menu(array('reverse' => TRUE, ...));
 */
function my_reverse_nav_menu($menu, $args) {
  if (isset($args->reverse) && $args->reverse) {
    return array_reverse($menu);
  }
  return $menu;
}


      function remove_core_updates(){
        global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
      }
      add_filter('pre_site_transient_update_core','remove_core_updates');
      add_filter('pre_site_transient_update_plugins','remove_core_updates');
      add_filter('pre_site_transient_update_themes','remove_core_updates');


      add_action( 'pre_get_posts' ,'exclude_this_page' );
      function exclude_this_page( $query ) {
      if( !is_admin() )
      return $query;
  global $pagenow;
      if( 'edit.php' == $pagenow && ( get_query_var('post_type') && 'page' == get_query_var('post_type') ) )
      $query->set( 'post__not_in', array(4) ); // array page ids
      return $query;
      }

      add_action('admin_head', 'agentwp_dashboard_logo');
      function agentwp_dashboard_logo() {
      echo '
      <style type="text/css">
         #header-logo { background-image: url(images/logo.png) !important; }
      </style>
   ';
      }

      function remove_page_attribute_support() {
      remove_post_type_support('page','page-attributes');
      }
      add_action( 'init', 'remove_page_attribute_support' );

      function remove_page_attribute_meta_box()
      {
      if( is_admin() ) {
      if( current_user_can('editor') ) {
      remove_meta_box('pageparentdiv', 'page', 'normal');
      }
      }
      }
      add_action( 'admin_menu', 'remove_page_attribute_meta_box' );

      //hide Page
      function hide_buttons()
      {
  global $current_screen;

      if($current_screen->id == 'page');
      {
      echo '<style>.add-new-h2{display: none;}</style>';
      }

}
      add_action('admin_head','hide_buttons');


      function cf_post_id() {
        global $post;

        // Get the data
        $id = $post->ID;

        // Echo out the field
        echo '<input type="text" name="_id" value="' . $id . '" class="widefat" disabled />';
      }

      function ve_custom_meta_boxes() {
        add_meta_box('projects_refid', 'Post ID', 'cf_post_id', 'post', 'side', 'high');
        add_meta_box('projects_refid', 'Page ID', 'cf_post_id', 'page', 'side', 'high');
      }
      add_action('add_meta_boxes', 've_custom_meta_boxes');

      /* function custom_wpautop($content) {
       *   if (get_post_meta(132, 'wpautop', true) == 'false')
       *     return $content;
       *   else
       *     return wpautop($content);
       * }

       * remove_filter('the_content', 'wpautop');
       * add_filter('the_content', 'custom_wpautop');*/

      add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

      function my_custom_dashboard_widgets() {
        global $wp_meta_boxes;

        wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
      }

      function custom_dashboard_help() {
        /* echo '<h1>Welkom op jouw Stepping Forward Wordpress!</h1>';
         * echo '<br/>';
         * echo '<h2>Links in publicaties</h2>';
         * echo '<p>Om een link te maken voor in de Publicaties pagina zet je het volgende in de <b>omschrijving/description</b> van de afbeelding in de WonderPlugin Grid Gallery plugin:</p>';
         * echo htmlspecialchars('<a href="http://delinknaardewebsite.nl"\> Hier de omschrijving van de link </a>');
         * echo '<br/>';
         * echo '<br/>';
         * echo '<h2>Gallery & Publicaties</h2>';
         * echo '<p>Wanneer je afbeeldingen en video\'s toevoegd in de gallery en bij de publicaties is het belangrijk om ze een titel mee te geven. Deze wordt getoond als gebruikers op jouw site met hun muis over de afbeelding bewegen.</p>';
         * echo '<br/>';
         * echo '<h2>Story\'s</h2>';
         * echo '<p>Story\'s kun je aanmaken links in het menu onder "Posts". Het is belangrijk wanneer je een Story aanmaakt om te letten op de volgende dingen:</p>';
         * echo ' <ul>
           <li>-Een Story heeft twee afbeeldingen nodig: Een header afbeelding voor op de pagina zelf en een "Featured Image" voor in het overzicht. Deze laatste vind je tijdens het aanmaken van je Story aan de rechterkant.</li>
           <li>-Geef een story de categorie "story" mee. Anders verschijnt de Story niet in het overzicht.</li></ul>';*/
      }

      ?>
