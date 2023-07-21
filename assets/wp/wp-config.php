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

//$rpath = $_SERVER['REQUEST_URI'];
// $relative_path = '';
// $_SESSION['relative'] = $relative_path;
// global $relative_path;
$rpath = '';
if($rpath != '')
{
     $dbp = explode('/', $rpath);
     $db_splice =  array_splice($dbp, 1, -1);
     $implod = implode('/', $db_splice);
     //echo $implod;
     require($_SERVER['DOCUMENT_ROOT'].'/'.$implod.'/config/global-config.php');
}
else
{
    require($_SERVER['DOCUMENT_ROOT'].'/config/global-config.php');
}
		

//require(__DIR__.'../../../config/global-config.php');
//require($_SERVER['DOCUMENT_ROOT'].'/../config/global-config.php');


// ***Database settings moved to above config file

		
if ($local){
	// ** Database settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define( 'DB_NAME', $wp_db_name );
	
	/** Database username */
	define( 'DB_USER', $wp_db_username );
	
	/** Database password */
	define( 'DB_PASSWORD', $wp_db_password );
	
	/** Database hostname */
	define( 'DB_HOST', $host_name );
	
	/** Database charset to use in creating database tables. */
	define( 'DB_CHARSET', 'utf8' );
	
	/** The database collate type. Don't change this if in doubt. */
	define( 'DB_COLLATE', '' );
	
			}else{
	
				// ** Database settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define( 'DB_NAME', $wp_db_name );
	
	/** Database username */
	define( 'DB_USER', $wp_db_username );
	
	/** Database password */
	define( 'DB_PASSWORD', $wp_db_password );
	
	/** Database hostname */
	define( 'DB_HOST', $host_name );
	
	/** Database charset to use in creating database tables. */
	define( 'DB_CHARSET', 'utf8' );
	
	/** The database collate type. Don't change this if in doubt. */
	define( 'DB_COLLATE', '' );
	
			}


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
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

set_time_limit(300);

//define( 'WP_MEMORY_LIMIT', '256M' );


