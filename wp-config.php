<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


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
define('DB_NAME', 'mollypress');

/** MySQL database username */
define('DB_USER', 'mollypress');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         'o&fLl}n%t!b .QYxcc8hxe-P?/iiDk36uB Cq.k.J#MVoSX{AH3GkhJh@?XQclN|');
define('SECURE_AUTH_KEY',  'f4sP|C+OGW(ed$.7O{aIv.$FefwQ]M[5<Pl-AZ{;Y+d+rhbbt)OP,n3{<e/Ppo;I');
define('LOGGED_IN_KEY',    '6?*b;e]3_K}e|Z>tw<:Su5?k@{L|r>EupN/hzM<ex-@AFuH8+PO&<`[/b xRx#==');
define('NONCE_KEY',        'h5}LCddSuB:%GT_/ >cD|i;wDsL$1E_`I0Ho9cz?0 |}%|-:BLtXX9p*b&-XvZHI');
define('AUTH_SALT',        '-L]>`-vJP=&c`TqqUWtSi!2Q[xGut#PD^9YzYC-WrR/TM+PkG{)H0. X.vj-Y+=+');
define('SECURE_AUTH_SALT', '@.u!>x6v.9aFfnD>nCUUAWTU )GO@ryepv:xx|)NLbA(LZt$&F|;3cf7z}-Vm0+S');
define('LOGGED_IN_SALT',   '0zA9/? cpxKn0_f<zu0~3Si^`uc4aVu8OcOiY2:b|L+mS,dy{!j+bqgfd~q$[U{+');
define('NONCE_SALT',       '~2-g8t.B!Shqzjg0~$Ine}etb[W`9iM+cJS~C6wRr:@7&[/NQf#f(N&?=wJL!syf');

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
