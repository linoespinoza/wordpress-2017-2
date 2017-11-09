<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define('DB_NAME', 'ipad1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '~Vt~6=!I4ln4E!pMy;~JsQ]jh0-})=SS}Bv@i,VMy=QG$;o37tow+4PM##s/sdQ@');
define('SECURE_AUTH_KEY',  'oDV27r#L/=2W{)SNWtDHqfP6Hl$<=zY0S`B0,[1X=Ty5{3~X.dzM|E>TH4e@x_x*');
define('LOGGED_IN_KEY',    'Kff>;jw4R:XFNu]8i2kQ%2SLxg=|rFkUxSJj5xXk&Aiy@fvM(rtFL$I0c5X,Ps7a');
define('NONCE_KEY',        'QQu+~vRST $mCj3pM:uzDuIzt=vg4a$WJxm>~x$=mwH1TEq%lL<A15T6OHZ7p3UD');
define('AUTH_SALT',        'PXFI<*&.&Ao ?4_Vy$]df7nOTK0)gA{/@u|:zdZC?S;y)AvAL$$&W/x_k 8~pN.N');
define('SECURE_AUTH_SALT', '!@k@{;_2g`D`zlL_QHa1p=moWE_;e>o8A^=&J$Ce[B)q +jO?}#,FjL+^dgr^L%P');
define('LOGGED_IN_SALT',   '9dIqW^|v?s(O=!Sd|.fk2k;0._/9%v}K0/#o6aT)eK%.0AoDPQwGP^NkCF^t+L*2');
define('NONCE_SALT',       'AMZ/>?4]fw9bP]0#?IMjkl1#v%vpZ]*GZS;B~dHtrrHL?.cSC2)}LEDQB+hLI&/x');

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
