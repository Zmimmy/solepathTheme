<?php
/**
 * The template part for displaying the hero video on each page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */
?>
<div class="hero">
    <div class="hero-inner">
        <video autoplay class="hero-video" id="the-hero-video" loop muted no-controls
               playsinline="">
<!--            <source src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/video/stock-footage-colorful-silky-smoke.webm"-->
<!--                    type="video/webm">-->
            <source src="<?php echo get_stylesheet_directory_uri(); ?>/video/smoke-to-right.mp4"
                    type="video/mp4">
        </video>
        <div class="container">
            <div class="row">
                <div id="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/images/solepath_header_logo.png"
                                alt="<?php bloginfo( 'name' ); ?>"/></a>
                </div><!-- end of #logo -->
            </div>
        </div>

        <script>
            var video = document.getElementById('the-hero-video');
            video.playbackRate = 0.5;
        </script>
    </div>
</div>