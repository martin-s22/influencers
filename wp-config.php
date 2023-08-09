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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'influencers' );

/** Database username */
define( 'DB_USER', 'influenceuser' );

/** Database password */
define( 'DB_PASSWORD', 'InFlUeNcErS123' );

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
define( 'AUTH_KEY',         '6w.=#(giY:e( :LLlgu(j,cjSxYY|g|y%K5wvce`K4f-brNkD} ?V07t(l_If1Em' );
define( 'SECURE_AUTH_KEY',  '$wHW!K$I<I3fA#C5$05[s+$kN55vOyS8+i}_!D.Qjs{cX9B&+EDC3lpdcljALT{{' );
define( 'LOGGED_IN_KEY',    '=H9#1ke]=p%R9APrfRb_g&v-(0_^prc>qMQ3e6}`mRn#_=a&I)ApTL=Gt@{)Z?au' );
define( 'NONCE_KEY',        'NO7HX _:R|MA!GpB/2GLOKF11-lCSWha/}{-9g%9&k|dH6+aN^/4JrTSFP-I}!jI' );
define( 'AUTH_SALT',        'gUX`:khO/:D_ke{;6Re:`{7+? os$bo}E`=!/5D,xw$l@:XG}4$5F7M5n5&c9f=r' );
define( 'SECURE_AUTH_SALT', 'Ndt7s<*+LF.7- -/SInv])A|8df+$^p^CPU(iOmRBL<&Z0$N w^$DQm^BaAGMkH/' );
define( 'LOGGED_IN_SALT',   'S;P<ahqt2%$XC%]2=hN$<GfGdReVNC-Nhd@y#BQj[-3{mp>$0e6_XIZG/HUK]PbU' );
define( 'NONCE_SALT',       '>RoJTeCmZ*t+eqQ=e`f>x7|R:gSp=poQFU$+27Cf|Y;!{8>h;H-H;h1mri,;9)zb' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nc_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
