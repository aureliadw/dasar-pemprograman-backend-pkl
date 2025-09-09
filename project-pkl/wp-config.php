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
define( 'DB_NAME', 'db_wp-pkl' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'TPcto25>9-LZsg0@%CO5{p?FzPucPee{(mni#^r+1}J;r.-n IBJ.FjP6_1G&z9s' );
define( 'SECURE_AUTH_KEY',  'P+5J}DU>oPj~8pU5NhgB.6:/C;Gdb@W T}4t-fY6Yuxgkw#o9[mHN:shhau5.GaK' );
define( 'LOGGED_IN_KEY',    ',Tk:*?fpHk%Vg0!#4?Kv{- ;Jr{%.,vmO6!`__M^?&j-rVl8rkR2mZz}aoy2KsH%' );
define( 'NONCE_KEY',        '+#D[-5cBcvhcf`K~_@e4H7LHPMEZH*QSo3_z7Is8[i;dZv-9utz_[k`)b?sa1hV<' );
define( 'AUTH_SALT',        '4{s,!nt[DS_Yt!-C%,5B$dxNrImiAB2-@*pswiN9=_.gU*dATbfw%e2aUP}-pt^E' );
define( 'SECURE_AUTH_SALT', '1{7_%oGZ IFC{u9,Js+b0LBt8Q{l-*})rE`r#6miMDp >f V}V$nb^a{R:cE/KZR' );
define( 'LOGGED_IN_SALT',   'E&(q;7lLZ-{ P@Ya>D#>.HxVNaoUuJON}^FP(A0vcK*&NY-pn>;L2XE`6It 4Z+G' );
define( 'NONCE_SALT',       '; ;Kta*qV()9 ZhST$0WG@JtMYT^fCS~%%6^o*%My1,mD4PPW#YyGV&cR/X=`(z8' );

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
