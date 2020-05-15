<?php
/* *
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */

if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?php echo of_get_option( 'nav_bg_color' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <script src="https://wchat.freshchat.com/js/widget.js"></script>
</head>

<body <?php body_class(); ?>>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
<div id="page" class="hfeed site">

    <header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-default <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="site-navigation-inner col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <?php if( get_header_image() != '' ) : ?>

                                <div id="logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                                </div><!-- end of #logo -->

                            <?php endif; // header image was removed ?>

                            <?php if( !get_header_image() ) : ?>

                                <div id="logo">
                                    <?php echo is_home() ?  '<h1 class="site-name">' : '<p class="site-name">'; ?>
                                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    <?php echo is_home() ?  '</h1>' : '</p>'; ?>
                                </div><!-- end of #logo -->

                            <?php endif; // header image was removed (again) ?>

                        </div>
                        <?php sparkling_header_menu(); // main navigation ?>
                    </div>
                </div>
            </div>
        </nav><!-- .site-navigation -->
        <?php
        $user = MeprUtils::get_currentuserinfo();
//        $this->sp_util->log_me("Got user: " . $user->user_email);
        if ($user === false) {
            $activeSubs = [];
        } else {
            $activeSubs = $user->active_product_subscriptions('ids', true);
        }
        error_log("header check");


        if (has_valid_course_subscription($activeSubs)):
        //if (false):
        ?>
            <nav class="navbar navbar-courses <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="site-navigation-inner col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <div id="logo">
                                    <div class="navbar-brand">SolePath Courses</div>
                                </div><!-- end of #logo -->


                            </div>
                            <?php
                            $level1CourseID = 481;
                            $basicFengShuiCourseID = 779;
                            if (in_array($level1CourseID, $activeSubs)) {
                                wp_nav_menu(
                                    array(
                                        'menu' => 'course-level1-menu',
                                        'theme_location' => 'course-level1-menu',
                                        'depth' => 2,
                                        'container' => 'div',
                                        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse navbar-inline',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                        'walker' => new wp_bootstrap_navwalker()
                                    )
                                );
                            }

                            if (in_array($basicFengShuiCourseID, $activeSubs)) {
                                wp_nav_menu(
                                    array(
                                        'menu' => 'course-basic-fs-menu',
                                        'theme_location' => 'course-basic-fs-menu',
                                        'depth' => 2,
                                        'container' => 'div',
                                        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse navbar-inline',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                        'walker' => new wp_bootstrap_navwalker()
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav><!-- .site-navigation -->
        <?php else: ?>


        <?php endif; ?>
    </header><!-- #masthead -->

    <div id="content" class="site-content">

        <div class="top-section">
            <?php sparkling_featured_slider(); ?>
            <?php sparkling_call_for_action(); ?>
        </div>

        <div class="container main-content-area">
            <?php $layout_class = get_layout_class(); ?>
            <div class="row <?php echo $layout_class; ?>">
                <div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">