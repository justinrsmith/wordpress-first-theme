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
define('DB_NAME', 'startwordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '~avCe6-)]-Qcz^zFY>#e})i:lh25Uq:-~y8Ft,8*#=`|2SS@UvIaYM$j$s~D.h~Z');
define('SECURE_AUTH_KEY',  'T>#[x=/(4=^Peol&smchCym=o7btC#;swIo{2vd|t`sSjDcK(+<z~JH1zj-b4dLm');
define('LOGGED_IN_KEY',    'khJ!l-}Ipv>Jf+~&aRh>I^GF tNv3&F*+nyd)5?:4%T:0q3tXIUZhfvyX0-q; aV');
define('NONCE_KEY',        '=R@w$z4p@=e;+)o!.fu>ESQKyu5=D9x.(|;w+X|3`yVt[{YP+::pn|wQNjBF*QvG');
define('AUTH_SALT',        'jQe),&+8$ CFD^55S&y_RXw-!>:V]4c_:@78/&-|WqlUYuJO&c5NhB],9N$vc7|Q');
define('SECURE_AUTH_SALT', 'j]lYp;km`+hXGGX]bE<Pno4IBTQ7RcEt.O%CL?&9`u(<G_+zuwaus{97Zs}zrVSO');
define('LOGGED_IN_SALT',   'goZ*-k8!+LJ~wp`2sMuI,c+kz8H%g&q[3~0xZ[6Stm,Fl7Layz%-M,oNu~Y=I_0|');
define('NONCE_SALT',       '(#nswC`f|s7jM0kZvweb/M,g!H0Z2IET7RQf79DL6l0JQch-kA!^Zr5w-@gyi+$2');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xyz77_';

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
