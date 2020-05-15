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

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_courses_menu' );

function register_courses_menu() {
    register_nav_menu( 'course-level1-menu', _x( 'Level 1 Course Menu', 'nav menu location', 'sparkling' ) );
}

add_action( 'init', 'register_basic_fs_menu' );

function register_basic_fs_menu() {
    register_nav_menu( 'course-basic-fs-menu', _x( 'Basic Feng Shui Course Menu', 'nav menu location', 'sparkling' ) );
}

function has_valid_course_subscription($activeSubscriptions)
{
    if (count($activeSubscriptions) === 0) {
        return false;
    }

    $validMembershipCourseIDs = [481, 779];

    foreach($validMembershipCourseIDs as $courseID) {
        if (in_array($courseID, $activeSubscriptions)) {
            return true;
        }
    }
    return false;
}