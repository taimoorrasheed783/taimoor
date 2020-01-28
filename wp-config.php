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
define( 'DB_NAME', 'taimoor' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'X}*x{M{[/Ltp#MOq=fY7XsD[Sct5#HUHxZMe#Tu)~Cc7H8}H&-$ :53}*=tNR|qb' );
define( 'SECURE_AUTH_KEY',  'tS>P19_l 8M`3p&MU{a*TXPW|x`FzNt8]*0rwEzGGdmX)kGlM+Nu(Ork@-S4^ 4N' );
define( 'LOGGED_IN_KEY',    '8SpsW2aWKn`g,VNP9]rbUqxnM<.a8`H1FQ{):$w@2_~cYs=I.CevN8d4L?5@#93J' );
define( 'NONCE_KEY',        'obRS(qBxFx4g9YI?m_c4p01cm[pT:/+6<N$9.gT.7pC7`CKW.KduIQ?IXt0oYwh:' );
define( 'AUTH_SALT',        'gL#Z m@dX{O$c>(|]6Z_I^9#>a`Bd~X<ukm)7#@%.&#{6xN1P@g9FmoN@^MI+9Rj' );
define( 'SECURE_AUTH_SALT', 'RZx%Ew$M}m!EF5hkcJo;EUcJ|Hm5S1Nn=-iHLLe>R@J)g7U$1;t%w0;x_*@K;t[n' );
define( 'LOGGED_IN_SALT',   '{h0K@Lpn+xA$rqB!&BGw_*0R3H|^l%g WyAJ~C+e>orxMbA<7#$S1T^17g53=V$.' );
define( 'NONCE_SALT',       ':P6p)Gb5~~dXn{}o.um<GcVc_6P.7f3QvWA$SAcS$3s5j%m9_<C|k]BcPJPEqJOY' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
