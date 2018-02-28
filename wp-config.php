<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stepping_forward');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6mb?4J`m+!Z/ye8SW:5e0;j)@a!<q&nE>S~m22l8Wt~H2gE1X5Se)z#rCpsNIHfg');
define('SECURE_AUTH_KEY',  '}BGnmgF1K.f :dcM@8F4GdIqi4B]6a^bhvwh1JaxwbC=+w/Te_Y<[=Ry1|0vwQ2P');
define('LOGGED_IN_KEY',    '7.&.KD3G[Vr}Qpl8b3i_n=ss|H?WsI1>%4bgGYX@T>.pHNkpc{fF3/Z4V^YU!V1B');
define('NONCE_KEY',        '@mZmT>Z}vz_C6GuXLs=b~uQ*jqJ|ac`]0KzAvTIv(24#Ej/2C~tuNzpb#]t3yi//');
define('AUTH_SALT',        'bwn@PdC*]$h!p*)/0Q#=3/f$E}I)1|`=bh*#ikG(J1yQFc`TLk SCw~q[g`uz6LK');
define('SECURE_AUTH_SALT', 'cn.hI!IZemPe1Xl.Wc~BL~Gf%Q-eQ=+|OP_L94V0T3P#~A;n-jcb19if/py@=]E,');
define('LOGGED_IN_SALT',   'r+SKh1J{=#XbL#pd*=/UK21<GqC0LC-iwp0N5@;-=NnPa^I0I#I0@G#4cG(GQw:3');
define('NONCE_SALT',       'u8t!pAJz?eRu+GjCKd1J5FZ]7g],.65pn%|<-v^|[Rx89!64_Ic%QIM!d;(z6B,U');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
