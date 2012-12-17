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
define('DB_NAME', 'natag');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/** Setup FTP Details **/
/*define("FTP_HOST", "sftp://digiteksandbox.com");
define("FTP_USER", "ftpuser");
define("FTP_PASS", "Sys@dmin");*/
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+7RDwhJ}Cos.3>p%AWKGH}Pd|[hx!efl:$FcR`#_2!!hM*h),W?-6bJs#flls&kM');
define('SECURE_AUTH_KEY',  '{Le uE0mp3[m+Ma3&*[X|Bw LES~P}4a!.H{u5N`Z3CeOdJ~7:R!&*rmv_=#!0{!');
define('LOGGED_IN_KEY',    'fg^Oj0&F)lEu{g@-9H|e+>C M0~/O]6m0uXlj3JJyKCmtooUr~jR0712=zr})(Jv');
define('NONCE_KEY',        '0|A/4B`=+3iS_a%nCHwcf;ELw^*u4lh^P+rRJ>a0P9)x+RM)7%d^(c81in]4-uq1');
define('AUTH_SALT',        'fz_@yU<qpo*Sb9Te*I: 7}a&dyX7Q0:ZQ7:E+Z{|tJ6{HwP-(~dma[f>r*8B3=[m');
define('SECURE_AUTH_SALT', 'Iu,Z-%3,irTLWIP5wCVc<oAxL|#Zc2g%9dL[3U#gcZ1CmYguc.%Bln:|3@Sv65Yq');
define('LOGGED_IN_SALT',   's4v6Mk|Vx5QN8|KeO_252{Ks ~@g/ddJ6QoXp}>cTZ3qyRDq{]~t5GLp-U3:#nT|');
define('NONCE_SALT',       'QC)$fKfnun!n3@Q:`v70L|<&f%@cojz(6C|:8>G1{c19MFwd`PU9>S%d|J)hbJZ7');

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
define('WPLANG', '');

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
