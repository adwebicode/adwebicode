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
define( 'DB_NAME', 'ad_web' );

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
define( 'AUTH_KEY',         '04.ROU7>e74%(=,y%v4H@f+Vv)7WzRl:75`t,uD`nz;]^[MLp0I>{2hYf_GfQ-.N' );
define( 'SECURE_AUTH_KEY',  'CBFnW{F$?-eVZ0PC>>|#6cr- wJ:BGc9LM)GO~HQSuRLd;M&?9sAyw^W(rMn&x=K' );
define( 'LOGGED_IN_KEY',    'G3{< W{~!~u_YWw##!0)cS}Udoyj5tVUU]ALe?4KG=6 *18B`*DzfY!b97pcO1l~' );
define( 'NONCE_KEY',        '>$Y27eG:3/i7FI)aU!$K5>f/w1*{Q`3_o>-4DHI^35HZ2VXRzfo/sa?8lto>_}]D' );
define( 'AUTH_SALT',        'uSlUwF<.D?q(7[n>JHkTSL*Zk![IkNUB2?W]tn<5._).i%c#J-yD{tn@b9l`wg =' );
define( 'SECURE_AUTH_SALT', 'slsf~s{/Vw9|nl5S~=Tc5)DWmkS?QWDV<]VWP|cqt! wSnoH0H|4^K#]Q.!^&,0*' );
define( 'LOGGED_IN_SALT',   'w~_z$)I*} TG^US2-isyVtzZ>noIss;y!h55iLWk6xm@V-h<^@E1#>(NE~VUwfO9' );
define( 'NONCE_SALT',       'Pv<VVlaqeq$ypsrL@2d/AE-7Z+WEs4cFDq;Ic2|^gDBK)<bi`j9/l0SUJLS?*8Pf' );

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
