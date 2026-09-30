<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

//variable define
if ( ! defined('ENH_THEME_DIR') ) {
	define( 'ENH_THEME_DIR',get_stylesheet_directory() );
}
if ( ! defined('WPENH_THEME_ADMIN') ) {
	define('WPENH_THEME_ADMIN',ENH_THEME_DIR.'/include/admin');//theme dir(content)
}

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_script( 'astra-frontend', get_stylesheet_directory_uri() . '/js/frontend.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true );

	wp_localize_script( 'astra-frontend', 'wpenh_object', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ) 
	) );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
		$login_page = get_page_by_path( 'my-account' );
		wp_redirect( get_permalink( $login_page ) . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
		exit;
   }
}
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function verify_username_password($user, $username, $password) {
	if ( $username == "" || $password == "" ) {
		$login_page = get_page_by_path( 'my-account' );
        wp_redirect( get_permalink( $login_page ) . "?login=empty" );
        exit;
    }
}
add_filter('authenticate', 'verify_username_password', 1, 3);



function custom_rewrite_basic() {
    add_rewrite_rule('^editprop/([0-9]+)/?', '?editprop=$1', 'top');
}
add_action('init', 'custom_rewrite_basic');

function add_custom_setcookie_rewrite_endpoints() {
    //add ?c=123 endpoint with
    //EP_ALL so endpoint is present across all places
    //no effect on the query vars
    add_rewrite_endpoint( 'editprop', EP_ALL, $query_vars = true );
}
add_action( 'init', 'add_custom_setcookie_rewrite_endpoints' );

//post type class file to manage thteme custome post types
require_once(ENH_THEME_DIR.'/include/class-wpenh-post-type.php');

require_once(ENH_THEME_DIR.'/include/class-wpenh-public.php');

if( is_admin() ){
	require_once(ENH_THEME_DIR . '/include/admin/class-wpenh-admin.php');
}

//require_once(ENH_THEME_DIR.'/c:/xampp/htdocs/elite-nest-hub/wp-content/temes/astra-child/class-wpenh-post-type.php');