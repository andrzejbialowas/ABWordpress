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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'ebU_t>Y$Ar[A15DZ|zSs9:L7zDQXJC ?LR07k&^{:$!wbuCk}`}pxPr&*B8vV&&~');
define('SECURE_AUTH_KEY',  '[49!Kq%O^d=SKmzsoLaIQs2k_YAi+Ur}yn_xObfAgd}D Mbqt5[9LyD`2P5skgd<');
define('LOGGED_IN_KEY',    'u*<=r?f85ka|nPr]kr;PvqqgMCFRaXu7)ai@@<)t<LWI%{/5GV=]t4a3m>rCCXm.');
define('NONCE_KEY',        'QaM3}nD!1bRK).RVRgRVh&BUGf]yIih7Q){No;#!Y=im@%E.z:CmCPdEXz:Vq4jK');
define('AUTH_SALT',        'u#^+p-rq/jW.!aI?(Y&suc[K/c<rADr_s|cIAuK(47E>dx!u5wxS-QgLq;&QoT+3');
define('SECURE_AUTH_SALT', 'NahSC5n:QB(@MySb!s1M=1chb]aAcs|eZYCHcFXr]cbM8Jg(KGZq[wU~m+|eW_AM');
define('LOGGED_IN_SALT',   'Gulj.k=U3u*$^ t[4~7iehcY#xZ{L2]]9O[oLhlGVN>I34 z(pTj+h>5&`b,ZEiT');
define('NONCE_SALT',       'fk(R{:6oOc}RYV6b!eahLn#+VOUUBDOix }-s~3`~rI#36GoB@Hs0%lSdZoVuO#t');

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
