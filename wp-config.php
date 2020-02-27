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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7o/WTJIqVrtZDBh4ldRn2QFcqOcL634b77TkF3YilvFJ4Y3w0Ez9VXlmJDGY7xQ1XYsyzMSlayIw996KPUhPKw==');
define('SECURE_AUTH_KEY',  'IH/w4ZsuuTq7RADwxsuMkqRzS/ZpT4R0SuRL+yOz6T3GME0/PkXVyNxZzj4mg1MwPRtA40GJdn+D0aI+Lv+F0w==');
define('LOGGED_IN_KEY',    '3aG2zqP/CGre5dA58MnEEgnqzlQqgcUlBdTDwwaI3FHzdeicD7zifU6GEp3rGlNVdAPvXR5GaJhsA8dV9zfKNg==');
define('NONCE_KEY',        '9wIaObMCzmpl4/6pqgyT8cu02f13eMOP60wdQySzBvz4wv5Cls7JKYg3o7mEYneVCqG9VvxXDpYal1apsRULzw==');
define('AUTH_SALT',        'r0Xj8fCLAmv09Gd0ohtPJ4c3WZkpss+UgAcbiQwByPDVkLD2t4DkIvqCxRHX72DDjnP7BE/ulZOFI29do+3lRg==');
define('SECURE_AUTH_SALT', 'aWn8rV5K+NTqv4/afan6zl+PSiyFzHtHcm/itLaSmuxo2IlUzrYLL9FW7yXkf8HSY3RIi866vlf9Cpveazw+8A==');
define('LOGGED_IN_SALT',   'fITAWiJeYA0rjfWzKLwm2sS63px6Fn86q5YWgqWHyI8SJU8tM8GpAG87sdtl1+Y7uaWoq/fUH9OiBPnoSu/b1w==');
define('NONCE_SALT',       'RTWpXN2XW9DZ52dZX48qCd6bq2PjqZFrWspXSrWe+igpQv2u8QItPUB+XuCs9cdTD6MHwouI+LV+k808vHk57g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
