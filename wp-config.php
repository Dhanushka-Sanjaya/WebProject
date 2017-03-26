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
define('DB_NAME', 'designwalk');

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
define('AUTH_KEY',         'f~vu_od6?}-Q<%2Qm+poY(D4|,ay7M@_&T/]R=OIdq+LR<X4.@?2twG3kW{:J<b?');
define('SECURE_AUTH_KEY',  '/#V9iUe8M?OL_q^Xv+%(-z;p0IXXe0CmK6w|2+~oBus!j`b;ZM?EHJlxRWG4M{bR');
define('LOGGED_IN_KEY',    't0_H?@e4aMz?BlD-K.S?-un#;HL(zIlWkH5XnW~978$A=tL.NP6b5|:)!7;![6Ck');
define('NONCE_KEY',        '%Y]>C12(96/s5{qwYE,B]OH81:=x@5$-9(~,pG:Tdz:+m?e4G<U@Mq:JF{jb%Dg&');
define('AUTH_SALT',        'o|GX.TfW(BFtJ> njuI k>Qt&i~t&Lk._q:Ih}Z<Rhx8wI%}dJd9bzlh85A.oYd@');
define('SECURE_AUTH_SALT', '$xKI0(X.PJ@B`-1ZL3G=:qK<Cu,ETWP@d:[c[ A1uJ4%juUb$~ ^zX/M O&bAtLl');
define('LOGGED_IN_SALT',   '*Qn1aH90W6xfvTHY?N/!*#?c}@5FDp^^%`/r(,ytAR!y/V[8WK?YE(>p7HfHiZKP');
define('NONCE_SALT',       '+mY)BS-+c[WLv0Hh-tLiI|,rF3!NmE2V1L7^N )Mu da6&:WFD~-*_zgx=uW87~I');

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
