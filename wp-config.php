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
//define('DB_NAME', 'lps_smt');
define('DB_NAME', 'smt_wordpress');

/** MySQL database username */
//define('DB_USER', 'admin');
define('DB_USER', 'webadmin');

/** MySQL database password */
//define('DB_PASSWORD', '123!!@qwe');
define('DB_PASSWORD', 'smt1234');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* Multisite */
//define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'nissenidea.com');
define('PATH_CURRENT_SITE', '/smt/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I-*.ll)eyh1$?st4F<6W73}BkLB_zdGs#^!6m>f}tR0tI#7Jf/xS9GpT/Q-*+R-?');
define('SECURE_AUTH_KEY',  '~ECMY;>p&74x4kl0;cXXoZ*H(Hwe{H-9;g+3 -:WB8)H6#Gqdw1d$Jv10Pa{,ag+');
define('LOGGED_IN_KEY',    '.|DM_X5+bUx+{*bC1:Na0+J:]k4_KjQ/5toZ;|HWiSZwQ~d2[R||^k3WdN!gCmx.');
define('NONCE_KEY',        '{OKg,%1Zt_m^Aam4hE_-R>4aGWcc(AxDue4Y9AdeMZie+EB}b@0_?ar~hYNwZo|r');
define('AUTH_SALT',        'jvwLBe9vea*1U~tR({&EYRJI0M<7RRTCx>?WJsSWu%qq6^5-7.-4rlL}.W3^ ?&1');
define('SECURE_AUTH_SALT', 'se3ayKP`g3,g|c$|w^cQ+Vs(pkwNVW}U|#)+0$h/x+w:=!8,rTd@_<~m=ExuWO8F');
define('LOGGED_IN_SALT',   '|+~|EPM]55IC[f1AQy|A.,PA|^z/>-r|-D X-m<`j}`Brc^/=|E<}.TkZ?iaC,MD');
define('NONCE_SALT',       '2[-IfhawFcU~5AuO&l=sH%ZBgI:Xb?)= { A;w=sW#/HmzVL/s0?aL4#,|Dt+!WL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'smt_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'pt_BR');

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
