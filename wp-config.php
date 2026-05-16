<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'batdongsan' );

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
define( 'AUTH_KEY',         'G]fb+6+#YSRYE(bwGa9+1>JRJDp$@1(5em^D=[3V0bJH*9FzR^7D@ief50~-3%~)' );
define( 'SECURE_AUTH_KEY',  '.Xv53+8abP[Gj[{dl:R_K8r=?>Q]YepsMpA~l+MsU7Ho|;3c!)pDu`JO27K^1yVz' );
define( 'LOGGED_IN_KEY',    ',K*xe6Q2H`x2+Y@wJx;sb?jz(YVdCex5t4] P~r@TI))F]{zryoF4I%bv<TF)S`d' );
define( 'NONCE_KEY',        '7#AK[PcL 8-KLC}18.{_XLiY?g`}LPyenrK(P)GGWGs;^_4t![>)aU$Bms8UIRA,' );
define( 'AUTH_SALT',        '[~,qa>w3ALBx6r@CI~2Fno]5{fZ,NSucqp;@tk6UXlM-}la]P1-_(5*bi32.fc`U' );
define( 'SECURE_AUTH_SALT', '4!VdaGl-L`hM]L}3N |m?7<JPe3|&$i3$YH8I{X5cfJM3~WG8SLfS&$D`gs{>uH.' );
define( 'LOGGED_IN_SALT',   'U3j9#frzOmRLDI3lXC9J1&_rWZx._3n[Oi53g|1dX,Dga<~N)BW-olk/FJ^nR+NZ' );
define( 'NONCE_SALT',       'Jl}Y>3FHh%[m4B+5Xpz:0bFnH,;LVC0|yohB=!Y2OA!1&TzLk`N_/)qne#2n.P.r' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

if (
	( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] )
	|| ( isset( $_SERVER['HTTP_CF_VISITOR'] ) && false !== strpos( $_SERVER['HTTP_CF_VISITOR'], '"scheme":"https"' ) )
) {
	$_SERVER['HTTPS'] = 'on';
}

if ( isset( $_SERVER['HTTP_HOST'] ) && '' !== $_SERVER['HTTP_HOST'] ) {
	$scheme = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) ? 'https' : 'http';
	define( 'WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST'] . '/batdongsan' );
	define( 'WP_SITEURL', $scheme . '://' . $_SERVER['HTTP_HOST'] . '/batdongsan' );
}


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
