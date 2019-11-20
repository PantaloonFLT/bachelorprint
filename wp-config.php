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
define( 'DB_NAME', 'test_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'test_wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'khL2Sw9j7i19fvm2' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xWWVW2VsvA4+Xq9msURtOeL7dHshwYG7aFzU7U5h266yXXwE6bzQXg==' );
define( 'SECURE_AUTH_KEY',  '3zcTcLfAq5uEy/vIM2pyH04ZGPYCHMzV2ioACX4kHL8p3Qs9YFxETg==' );
define( 'LOGGED_IN_KEY',    '7wdylLXQFTaYQRELvNOh2g1EM/N4111wFpQQRwheF6Hv0LQUwnlYPA==' );
define( 'NONCE_KEY',        'KNq83Be2foZGaIRTRM/qn2X44HczGWevKbfirinVQBt57/QXhbaj5w==' );
define( 'AUTH_SALT',        'sCxiEEHt+GaEB+bATcEaXSPsel0I77NF1HuoemEqTV1K+Ld6DWfLEA==' );
define( 'SECURE_AUTH_SALT', 'YmvZpMpnKR+k8Ih57dQxCutjhRpIpDRTZi9jA8UwfC1EXjRKUr+XHQ==' );
define( 'LOGGED_IN_SALT',   'VFbqN1lB0e9iyWZr+ykSAtuFH0BokP7fF6u8TofNID0PPIz1SViN7A==' );
define( 'NONCE_SALT',       'lppQ+dgBRiOhQs5yQd6lDob2uH9d46Kq+D5c58H/S9uWdE5uSM1GaQ==' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define( 'SCRIPT_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true);
ini_set('display_errors', 'on');
#error_reporting(E_ALL);
#phpinfo();
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
