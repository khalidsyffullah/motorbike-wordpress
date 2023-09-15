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
define( 'DB_NAME', 'speedoz' );

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
define( 'AUTH_KEY',         '$TCfPQwR#yXTJsfTo@Os9N(E(_p})NL.--8:4=wg)UC%5Xl$|h+1*C@]W>4#|BuA' );
define( 'SECURE_AUTH_KEY',  '>vh!HZjByAuRMFf^4[76TX#]H`Y?#Wqv{BE,I/rYz[+]P_ZwdO&]OT;zmFBt=v(A' );
define( 'LOGGED_IN_KEY',    'GY<@6yym2SJK<hf.DuWpTZBxwK=a70%@lnx90N&bf,PXN0A _7*pUh} ERg[tlb9' );
define( 'NONCE_KEY',        'HC^(S$Ey0kon7WO^h=r8x:rH3Sq&&}O.K|^T-L8Q[~LmppPx}xH4u;,fv>=w))uz' );
define( 'AUTH_SALT',        '7I[wH_m>ZI3E-pc#425%seE 2ICyT]7cJE?hRv:pMD(@15]CQ+aCIYcHyimC7Cle' );
define( 'SECURE_AUTH_SALT', 'd}o{.{O_4C:n6Fzt5o&iRGneWVDjW/T9nC;=U}Vo8dFs,6SimT#ND_X$=X6+X1Rx' );
define( 'LOGGED_IN_SALT',   '=)4,NIx93k0uL[mlY&Nvh,XU3BPt%=N_MI,ttxF?6(3aLtWkewu.R$R#X_Hy5j*/' );
define( 'NONCE_SALT',       '!u+8WZo&,7vir/sxbd%Vqxd!l@$50)FifTRIH$kBsY``AW_7qxF[Qn}:UT:d0`by' );

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

define( 'FS_METHOD', 'direct');
