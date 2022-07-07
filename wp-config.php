<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prj' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'FW];o`?|FyC?n@)V5)r+A.$oZv2J9KV>BS)?T8=*~ajAA|*C>~EQ1#n]lb3r%7RP' );
define( 'SECURE_AUTH_KEY',  'N1[.4U&FYZkM%l}|-#&WUnF_G|KmyE9NgH.3TEK>yZZ!_e&HmB~/DHZ^C5{B7{AE' );
define( 'LOGGED_IN_KEY',    'GTS_RhC%CByj3Ldkp,&1Ta_hX+n>>~gVBSp$zDX!l/#gq{e};=lIMkJMK;=)!^d*' );
define( 'NONCE_KEY',        'Udze_DOsy%mYbg>B]RZoEgzj=Bsea$ XAT&J^x_Y>DwY;tG|=l:b`imS0f_VGIUL' );
define( 'AUTH_SALT',        ')A7CJqJji+XT<Cd)h7z1^#zEvr2WR|0T0? D-klR]^~raMZ|<i:13I~myfXF|]e3' );
define( 'SECURE_AUTH_SALT', 'yb$$bo1_qrxqw=.-!Mvf}Z4zS4a-`kS6~#x@EzfdXKV.|UQYTI$8,%U*VJ6aF/g_' );
define( 'LOGGED_IN_SALT',   ')Hg^%#HGI*ZK=0*&-F|Fc9~c#|>-nT#{(a7 0A=i?_ryDdhr{&5y Z!7l3J1}[;$' );
define( 'NONCE_SALT',       'A+S%y_ec*O|Quhs@X4_zBPeK`&(ZR WoPHk^H;u!`JA.mQd<*Eb`,hB9|JT{&wj}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('DISABLE_WP_CRON', true);
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG_DISPLAY', false);