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
define('DB_NAME', 'wordpress_23');

/** MySQL database username */
define('DB_USER', 'wordpress_32');

/** MySQL database password */
define('DB_PASSWORD', '3p!DUr9sW7');

/** MySQL hostname */
define('DB_HOST', '50.62.209.161:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '#boNOe2jL8MTBujy@qXOowhHYk2FGThIjFrvpRUV&zNUBfJ7zI&8GBSXjO^hib9F');
define('SECURE_AUTH_KEY',  'L^W59iTJC(otV1qSnhzW@!15aPQB5WOPKjrQ8rYHYGDOBlKDKiRGyF5#AxK8qWAA');
define('LOGGED_IN_KEY',    '9Q6P&hQhw&M8PoNEP73Nv#qUGI))WyAs*FD0DwfIS@YX08K63d8!IeAfBqcF^G0G');
define('NONCE_KEY',        '*K*@6v0OS3oHXkDd@u#L(4!H7wGnldZeZ%yAak0mg5Br1w#FjETo*YDfq9*isxdl');
define('AUTH_SALT',        'ez%HFwGwwajo%t0DSpW@UbXEA*UqRaU0bTKQE94r9NbbE*fwnkrg#SuySnwypnK4');
define('SECURE_AUTH_SALT', 'nconTUVc9xAjinT9L7*)hauj2ywxyHznuuozWAbVEg#T*1jYre2#qUrd49ShprwM');
define('LOGGED_IN_SALT',   'VQR*r)FP)pP&3Fb9xffd##Feg4E7dZU^A8gYdUbd6iSDsLzhRCYmsZAxknXFAR2M');
define('NONCE_SALT',       'l0I66sm^r1BXBtmQ(5X)OpT!tANFiw9eDj0Q6DPjN*tesiK(n^#6zLrkY^v#pDBX');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '34K4Jx_';

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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
?>