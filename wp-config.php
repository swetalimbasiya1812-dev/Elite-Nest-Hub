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
define( 'DB_NAME', 'elite-nest-hub' );

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
define( 'AUTH_KEY',         'e#gEG0H;R_R(Wp.?d[sn*O&ME`#n88X`I5ABCJa NAJuO.uw]2RQFst0?>L}R0J!' );
define( 'SECURE_AUTH_KEY',  '%9f3wb!9CNHJy%M @@$j}zt>Y*nj3kRkv:,yR3kgtF1(D6GuaV*=ls+~a:|>&:]5' );
define( 'LOGGED_IN_KEY',    '<io#f!3?R(UdvDzcSM0Rkla.>>_xW;4FI2~v>{Iu;(Gz6da2158BpOVtBzTMRY};' );
define( 'NONCE_KEY',        'OZl(q6rS[o&N wXHQLmo <k{L]%d ,Uhx@/sLpt>p;$tH2L`M?eM6&3i-k~G^r*~' );
define( 'AUTH_SALT',        'uxe.LT{iz(@$r%F89OPOZ0tM*~^@PupB)~/.?a[(n|N jQ#JX6Lx%ezk-`Knm<&T' );
define( 'SECURE_AUTH_SALT', 'r#9Ck4^H(Nd>`F:;nA&=MmYaI3U2.Qc8Z%=ye*}HY2fWs:61QKX(c:LaK?Y85|{|' );
define( 'LOGGED_IN_SALT',   '+p(8:^,=c8v*0pb|#`Vf;,5nZkX^z0wn1Dm$r1nct#f:d/k)G$R/;?9{g%D}!q,7' );
define( 'NONCE_SALT',       'IKq[#oe;n3xr|DfMZsv-s$nj04Shj^/.Y</Ye8CqKr![ hi*G0x(ym;BD{XME6=N' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_HOME', 'http://localhost/elite-nest-hub' );
define( 'WP_SITEURL', 'http://localhost/elite-nest-hub' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
