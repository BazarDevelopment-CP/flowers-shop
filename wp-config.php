<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bazardot_fshop' );

/** Database username */
define( 'DB_USER', 'bazardot_fshop' );

/** Database password */
define( 'DB_PASSWORD', '[~1Xd#Dh^X.p' );

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
define( 'AUTH_KEY',         '~JfK|E^;,,Jc/3Q9uoB&}kYk@M9#eN0M!0*s1_i3@W1B0f~fM&v;LHnk]R1Q/qAc' );
define( 'SECURE_AUTH_KEY',  '2xfo?|Ee+,k,iEK^,# 6wBLyXU1P<>P9F1Lq@[:)nMg5/-m{ap~dkf08oSqCqp/R' );
define( 'LOGGED_IN_KEY',    'Uk4[[s!=LO*Iz@!Ag2]fZL$x1WlB(lJ4.;B_dI:mLzrcS2JJ*!<RQ?qC30nl_pz0' );
define( 'NONCE_KEY',        '|$m.6[8VxTf(),=#h5*2/Tl-YYTCvP,qS nB}D7Mlu|%X9Ql@Q%VX$$T;6!cTt5J' );
define( 'AUTH_SALT',        'eLgeJik_4$SNb1.hO1EamS :rJHTa7Bh{Q{3o2Y_ tcn@Q,tZ`|fx[87_ TAC*Z^' );
define( 'SECURE_AUTH_SALT', 'E%8MOb #3(B;sFN``bIVwc^`uSj Dv.ZPFZ;qoN~z4w|.s5>HN#+O]v_iwz4pg7}' );
define( 'LOGGED_IN_SALT',   'L+ecG_n0EP/@$%3<ctC%6*-~=9LHuA7xrn/y*+K?I6l/7V5E@/+TeE?fq0QsGv>3' );
define( 'NONCE_SALT',       '>z(A#6#i~CGV2o7<<7N{_O+iA[@^3j[&FRgIEJ`jFPVdn:`pLsp:aqAhM,@eOb#i' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fshop_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
