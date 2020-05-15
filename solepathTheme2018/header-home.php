<?php
/* *
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */

if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
	header( 'X-UA-Compatible: IE=edge,chrome=1' );
} ?>
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
<?php
global $wp_query;
global $wp;
$postid = $wp_query->post->ID;
$thePath = get_post_meta( $postid, '_solepath_path_value_key', true );
$theCategory = get_post_meta( $postid, '_solepath_category_value_key', true );
$theDark = get_post_meta( $postid, '_solepath_dark_value_key', true );
$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
$parts = explode( '?', $current_url );
$urlparts = explode( '/', $parts[0] );
$len = count( $urlparts );

wp_reset_query();
$bodyClass = 'is-in-dir-solepath';
$theCategory = strtolower($theCategory);
switch ( $theCategory ) {
	default:
		$bodyClass = 'is-in-dir-solepath';
		break;
	case "charismatic":
	case "inspirational":
	case "intellectual":
	case "intuitive":
	case "spiritual":
	case "compassionate":
	case "seth":
	case "solepath":
		$bodyClass = 'is-in-dir-' . $theCategory;
		break;
}

$thePath = strtolower($thePath);
switch ( $thePath ) {
	default:
		$bodyClass = 'is-in-dir-solepath';
		break;
	case "charismatic":
	case "inspirational":
	case "intellectual":
	case "intuitive":
	case "spiritual":
	case "compassionate":
	case "seth":
	case "solepath":
		$bodyClass = 'is-in-dir-' . $thePath;
		break;
}

if( isset( $urlparts[3] ) ) {
	$bodyClass = $bodyClass . " is-in-dir-" . $urlparts[3];

	switch( $urlparts[3] ) {
		default:
			break;
		case "shop":
		case "cart":
		case "product":
		case "checkout":
		case "product-category":
			$theCategory = "sole";
			$thePath = "pantry";
			break;
	}
}

$bodyClass .= " is-sp-home";
?>
<body <?php body_class($bodyClass); ?>>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
        <?php get_template_part('templates/solepath-rainbow'); ?>
		<nav class="navbar navbar-default <?php if ( of_get_option( 'sticky_header' ) ) { echo 'navbar-fixed-top'; } ?>" role="navigation">
			<div class="container">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar-header">
							<button type="button" class="btn navbar-toggle" data-toggle="collapse"
							        data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<?php sparkling_header_menu(); // main navigation ?>
					</div>
				</div>
			</div>
		</nav><!-- .site-navigation -->

        <?php

        get_template_part( 'templates/hero', '' );
        get_template_part( 'templates/sp-cta', '' );

        ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="top-section">
			<?php sparkling_featured_slider(); ?>
			<?php sparkling_call_for_action(); ?>
		</div>


