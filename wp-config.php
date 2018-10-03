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
define('DB_NAME', 'wp');

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
define('AUTH_KEY',         ';nK5pf`iXV3;O|Re!j[GU]AAv5%i]dVOfMY,!>>f!{y;jR YMvlfLI.c$~xAHs;I');
define('SECURE_AUTH_KEY',  '*4YwcLeGO#s/]yy)V^Q#/#!=wp/DUqJpU&ZkR_Q5VXdI#Wo:rRE]<8nY,U}t01d2');
define('LOGGED_IN_KEY',    'XA_D*4%Q.@z`TaYM^nHc$9YE/j?Jesw2iw+_ZU{Lq&Z*)2|&>0{9Ez)nBqp9(`wz');
define('NONCE_KEY',        '(t8s{%I4u88Z! Q[e~T=p#923 A,6U9In^`1X;siOk:q)?]} .R:$MkhTG]e{NQ@');
define('AUTH_SALT',        ' al)B1HZK-021*A?UuvY&3&9%5s}+P-XbJl$Fe#DzuH&H:K^](0>9%::P^v_B1ll');
define('SECURE_AUTH_SALT', 'Vo,FCvR?s_qf&>FKcm5>DYb]Pq M@K<qpq7cdD&0JqE wgWm,EW;EA/_v?k[A#u0');
define('LOGGED_IN_SALT',   'R|2BQd(PZ`#f![e&V/l^,ma<]k|-y6bZWQcJlrC!r#(%sXc-z/4s&;JPoxY(;:h^');
define('NONCE_SALT',       '4M0VfsG-G:d;zcG} iyY-ms&v<YAh7w9:O@}f/W#_G<rW,hM@A0gmB|u{c*59P] ');

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
