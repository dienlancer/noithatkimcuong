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
define('DB_NAME', 'noithatkimcuong');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         'j/0lk8Pz2.( S]-G&MWTm =r::.g2wEp><..XB2&xz9G]9_G)>ZB]y9&,@(z]Nf&');
define('SECURE_AUTH_KEY',  '85G[XNbICza~o3##Xbz9-+]LXa&5Hk:^$uh*AO}J5LkdL8vuKH{3MqaSujv v4h%');
define('LOGGED_IN_KEY',    'O(;VU,Ye{kkN{a6>W6xU^i[0N0JsWYcxp!9T_7i2Wy>.%!_;jnT*:k_(763V[ur/');
define('NONCE_KEY',        'hK/TJ Vzy8A~D{_p7$b3k;e):FREni]adAgt|B11HZ)~0a~F~M?#gKz+n.%%bX|[');
define('AUTH_SALT',        'F*NJa7`;.of#XYq6]k4a`4]p5@4;)Oaye`WG,;Z1m&( >R|XIwtx+~?@q1#?1lkl');
define('SECURE_AUTH_SALT', '2~5{t[WXG}*$_B2Xmb6^N[MCyiP&NlG)!beFi(tq~P$J4l~12v:jh%88qvB1pU$Z');
define('LOGGED_IN_SALT',   'bdF2%~edY?y^dz1%|X@#w@!Y`JmJ= `pCH,-bk1EZr`x.~~pPu[v!01p;H!>`vX*');
define('NONCE_SALT',       '&b7l07!i 8o:oT?v+CI}ma3nO}+L|amHngkDf.5FT|7$e!Kp-!8s}3h[VlrZCf$4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ntkc_';

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
