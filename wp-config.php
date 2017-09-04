<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mutiaraweb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '-dsq8-%>Yl6S=M7},9`tBgm 7TDt<D/@[4jn]&4E!<@|G6jw9AFpF?n{|u)qLU?i');
define('SECURE_AUTH_KEY',  '.vd@zB1T|Mh7Q)/,KpXx+`S6]{bcgTX^r@kUj7FVT= MH~t;@U:Dl-4O+#G43%-O');
define('LOGGED_IN_KEY',    '%:i@E2eq VcI@D4UU7?N)MJV#yV5!_PT6<2f>X ($knrsso u/l]?CmC[h<BCb=>');
define('NONCE_KEY',        'yB)3C S[Lo|GE.^ds8i4cI8>7bHI[wHTW!^cV^# NuN7s>T3N}@`V[:u;`L{+ 4l');
define('AUTH_SALT',        '5p:q|&V<x&8b%mjC$),cF1VMZ]e-,3)FN~gS_XiTi]o<Hi5uF.U$j2vmvl?}Lb5!');
define('SECURE_AUTH_SALT', 'RSrD[GC)p6|fV|Ty*5Z%h+hqMWkN+wa>d)p>s>l bKD2L2#0i2_~A=vK5^jK XXi');
define('LOGGED_IN_SALT',   '5*`okX)au;0[.-@R{r/D^8C t=HIHV5&ZOUT=kbqv|h$*8QLqof?q6]w=4bD>ABW');
define('NONCE_SALT',       '#_0PL%T>;Sc++17rib*s&lZkK(+MY`&l%kn|%jv|{,e0Tgu`dN9?*!O6}I5y`g[V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
