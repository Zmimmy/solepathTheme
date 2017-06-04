<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'sparkling-bootstrap','sparkling-icons' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


// Stay logged in for longer periods
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in' );
function keep_me_logged_in( $expirein ) {
    return 15552000; // 1 year: 31556926 - 6 mths: 15552000
}


function add_theme_scripts() {
 
  wp_enqueue_script( 'main-sp-script', get_template_directory_uri() . '/js/main-sp-script.js', array ( 'jquery' ), 1.1, true);
 
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );