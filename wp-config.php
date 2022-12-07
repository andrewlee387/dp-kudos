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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'DP_Kudos' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'eiUpaJVtKZx1788J' );

/** Database hostname */
define( 'DB_HOST', 'devkinsta_db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ';IObh^}m`.%d+z*)MO29-B-`N!4yd+7LsbOgdi[u9R;;)ku[l.KkUs>k/PV.2I 9' );
define( 'SECURE_AUTH_KEY',   'RXTTS_wX(+z)*JJV|]~wXP}j-WInRmfP+laC|ucPsc%F*?D}Q{9[7 e{hbxBAko}' );
define( 'LOGGED_IN_KEY',     '0HH.r`}xf=~QO9h~wCWj0H*j4+5zO/.*-&=Ywy1M]@P}37xICeN(O<HD)YV>.mbq' );
define( 'NONCE_KEY',         '/l^qCTTb|y:uuvCT&L!doQ -6#MCJ]uOv|jMw bo4V8sGQ~MYzikGC)D6p>cCra.' );
define( 'AUTH_SALT',         '*7yISeeTzO@IQ^6<|Al(&D #Q}Ds~Yrtl(/M-3UO]1()yl2FqgPZ`~G.;|~-|U<N' );
define( 'SECURE_AUTH_SALT',  'TDYAE^Z;9~E]Nv]jn=4FYE}Z=lt10?1m2oB&Je.$-lgmzAWomsx%upC!,[.rrZN<' );
define( 'LOGGED_IN_SALT',    '+{5(h!+.eA-)R*;>ekTM@BPAchc$o^uBY#pUO40G]N}Mk4[T*<V9bdr44&wxa+Fo' );
define( 'NONCE_SALT',        'AyR8U6reKs?:w;d<9KnZ@YXnf=uPwSW_ncrD`j!RAKHU+:~pjg750sn)QIyYE6g:' );
define( 'WP_CACHE_KEY_SALT', 'IT]ZhebXvfWapMxT`@$TEn)e8.$*Ef?,?cr9)$6j<$<CeAWEnv{AxlZEWh5B/O&b' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
