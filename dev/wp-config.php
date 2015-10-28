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
define('DB_NAME', 'kmtspart_hockeydev');

/** MySQL database username */
define('DB_USER', 'kmtspart');

/** MySQL database password */
define('DB_PASSWORD', 'Hockey10!$');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'UTF-8');

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
define('AUTH_KEY',         'Y .C>ra6HvCtU>U.oM{c=>r#JZ?<icumccMu^.7K[yE;(.N+nK1BD0$l6.Ym>6AL');
define('SECURE_AUTH_KEY',  '|3H;~G6#_r0Zly`rLDZsC5ELrNxsR!TauIqtCY|(`wYk%iD51Py8yHVRk+Ruls5h');
define('LOGGED_IN_KEY',    'djugz6:~d^nwTzDp$]+iE[Y_ZpI$=nNn?A;/zJAnVO}g0lEC`Lt^6,#zG,z)?)Wk');
define('NONCE_KEY',        'OUs*Anf46rY<QqvHo89| VZ(tM`NT=Cq4SWudMsE=3[x|yGmoQD$ClqgU2=OJ<e{');
define('AUTH_SALT',        'w:#16NH^4B^$Id-s/p`&8,pxXp7_/4@6CSq)eu@2|.r%w pgqIBTM=l{V+>?PL?e');
define('SECURE_AUTH_SALT', 'iFRhw:iCm?jY%#?7j2[guoBmhV0lnr-o91C|c?`mB1ulK5HqvLhV)GJ96fZk4ges');
define('LOGGED_IN_SALT',   '*Qf(^Ji^,8T`~%dlI3z;eZJ|g7FnTgk*`s{YEt(jFd`1Y_z[DOUA}dNpVwd1`JHg');
define('NONCE_SALT',       'wDW)o0A dZ%n}4[CJ qA >NjET^mR44TJ`J7bX4zUWZu JB}I^r.u_Lz0C$~k1H ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hockey_';

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
