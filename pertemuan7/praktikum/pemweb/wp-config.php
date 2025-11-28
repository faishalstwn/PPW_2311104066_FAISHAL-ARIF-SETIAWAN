<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'faishal1' );

/** Database password */
define( 'DB_PASSWORD', 'Stwn010906.' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'G$M?2TbG$.qP10|d[a8Yo~O[XQTs_)~&9.ecK*e;5LnWO&EMrPO)W+ho>2?2,6d1' );
define( 'SECURE_AUTH_KEY',  'Mu_Bjle6 ]yQ1q0Z2qYF#+&2;fEUAA?@~<|N1 CMGV-:Uq8.L#WpT!]|!8rmTvS+' );
define( 'LOGGED_IN_KEY',    '>G(F`QbmF12%OApht>F`PJ}vvQMX- E$C3KXVM(sA.$MX6`Ow]h-d)E4N~ouz2%@' );
define( 'NONCE_KEY',        'sDDT~y~5>3DJm5xH[?t]~s#<!oGrCir{S{^}Exp&#o]_YH7G+B-~zE||@hlZK45H' );
define( 'AUTH_SALT',        'A>B75n*Ui/5[ Zbi++ML*#u^ySCKpZt{tN]5`vt7+}Vc,+bA(Y:WtueyDPbu]n7i' );
define( 'SECURE_AUTH_SALT', 'b[NagBdJp?qmj[Bm@b$A~F=IEm}eGV~x07t1x&K*I(:$EZ/kLvcAW&q1;tk`JVhv' );
define( 'LOGGED_IN_SALT',   'G)D7aD)DIjg*cd]Q4_>aw$GL?Z-2i@f0Y??!N!y2*eJ-w^)FSBcAhIHAPXGKH[^~' );
define( 'NONCE_SALT',       'B&?X*O}j+0_NVl.G$p&[N$.`XqSp.>,oa@w`P4m[/| ~-;zyGj)&K[ y<NA3ruV$' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
