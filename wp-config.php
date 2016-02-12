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
define('DB_NAME', 'claudiaDBofqlz');

/** MySQL database username */
define('DB_USER', 'claudiaDBofqlz');

/** MySQL database password */
define('DB_PASSWORD', 'mx5YjalAMo');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'c[scN4|s,rYF^rRB}zjQB^qXI3.qUB{$jQB2.qbL2.uTA{yjPA2.qaH2_iTA]xi');
define('SECURE_AUTH_KEY',  '7zncQF7}zocRF4}^vkYUIB,ynbQI7{UIB>$vjYymbPI6{.ymbTA<$ujXPE3{*+');
define('LOGGED_IN_KEY',    'I<yqfTIA<$qjXME3{*umH6;.xmeTHA;#uiXPE2{*umbPPD2]*tlaOH5]+qeWL92#+');
define('NONCE_KEY',        'K2_xSG9:_wlZOC5_xlaOH5]~thdRG8:!wkZNC:dSG5:!wokZRF4}!vocRJ0|@sgZN');
define('AUTH_SALT',        'Q{$qfTMA>$rfUIB,ynIA.+qfTI6{TIA<$ujXPLD2#+tiWLD2]xmeTHA;.xqeTS');
define('SECURE_AUTH_SALT', 'kG4_wlZOC5[~shcRJ8}!vkYNF:!wkZNC0[@sNB0,zn70@skYNB4>@vkYYMB3>$vjY');
define('LOGGED_IN_SALT',   '|h:z[CRg@0FYo@Un@0FUo^0FUjv^}7Jbjv^}7JQcnzr$>3BMYjv$>AMXju^<3EQbu');
define('NONCE_SALT',       '{bq*{APb;AHTamx*{6EPip+#;ALTeqx.5DPait*]2DLWpx_;9HSalx_]DOWht-#19');

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
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
