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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fast247vn' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'Bh,!=M{,)+.%,[KwK6H>R-VQ*krvjG!6y12+?Xz+FAtCNq8(=g? ao3j7 uD.Q@%' );
define( 'SECURE_AUTH_KEY',  '_TS6Q&Cz.-&Dq5~kM,KDP9z_;9d/GtPYwTqpYtRv_3U08r*/>ly1l@nsl<E-=-`S' );
define( 'LOGGED_IN_KEY',    'N!@^Nw{1[py?%9Cu89@upZ]/v-QOjoS)~I4uQ5H&U7P3klDm[KZi]z@qE!<1pCka' );
define( 'NONCE_KEY',        'gkaYrrKU:dJY,O$58>@Pi|40CA^7R4,MqXl4J][&X}$#~y,V&@w40[nQuG)sxLfH' );
define( 'AUTH_SALT',        '-Q2tDnB0W1cNJj-5n8q/$~x`l`@QzjJ=VBL/Vsa_(K[(~uA*PBmvSA#_-_#]3DH.' );
define( 'SECURE_AUTH_SALT', 'rx8:Ai]a/ 6>hG!Nd-#_Bkq0S[cPS__J=e9Z&O5FzZP .{;tPmbN,ZCIL-a(m!c_' );
define( 'LOGGED_IN_SALT',   'HxmDQBo-6O_OTTk-S|JcnA]>IUfn.Eb7laDkqb+_ VtEK+#FvhZDpl1FI0G3%L]}' );
define( 'NONCE_SALT',       'C *S 65.Heo;cIbh0M+&O+?KE8U62euCD?L{hd<&V~K}MWc4_of=oGw[c_TFIOE)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fast247_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */
define('FTP_USER', 'ftpuser');
define('FTP_PASS', 'Fast247@gmail');
define('FTP_HOST', '127.0.0.1:21');
define('FTP_SSL', false);
define('FS_METHOD', 'direct');
/** define('FTP_PUBKEY', '~/.ssh/authorized_keys'); */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
