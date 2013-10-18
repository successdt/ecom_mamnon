<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ecom_mamnon');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ltt123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '^~QKls(}e>5V)R,V#V,L^t.%+YBw(Rcq)Z<h(kGA9,Mp|4u_>ooZrsi*q|Owrn&F');
define('SECURE_AUTH_KEY',  '==6/(o7`vx=2k}!z*=p+U4%*xYs[tvb55;d jC<pzm^}]gf4Fi+u|Ny$$*UXQYIh');
define('LOGGED_IN_KEY',    'R4BWy^:bo )B=4~_,L{^UdiD;|*&La,-h+X0iV,cxdp1$2nVtb}0%Sb9).VZ3O-S');
define('NONCE_KEY',        '/l_jQ38DRl@hP!_cTyib}8*OPG6QtH#B:u[F?3q9F0x_:R6H<$O{O]jzZkmt9~+]');
define('AUTH_SALT',        'Z5,ejUoU2u7cnjLv;VHi*,CO_}E3Y2KEEEnIzh0IXk%nWsp:Q/b4Zv)v<6E/~W;8');
define('SECURE_AUTH_SALT', '`J?*N&b#+(h`lQ3PSb;60]ir. r`4a5qQpT}/eU~IE3E&n@i1Y?<Nrv:)Vbye` o');
define('LOGGED_IN_SALT',   'qp|0OF/_>c5;!6;],Y$3;}=}^~[F,DjE@UtAk1* sIiaB]$siWk{;]3xcGCX(1`z');
define('NONCE_SALT',       '&b>&7f8(0l%wLZ)-h~<vYh!ei?|z-)qN-ZJce65|(,O?zq$iJ!X:N*StIcx*bn>s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'vi');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
