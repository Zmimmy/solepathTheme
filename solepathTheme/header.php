<?php
/**
 * The template for Header.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:700|Droid+Serif:700' rel='stylesheet' type='text/css'>
 <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title><link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '761448114023580'); 
fbq('track', 'PageView');
fbq('track', 'Search');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=761448114023580&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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
	
?>

<body <?php body_class($bodyClass); ?>>
<div class="outer_wrap">
<div class="inner_wrap">
<header class="flex_100_np clearfix" role="banner">

<div id="social-ribbon">
	<div class="social-container">
	   <div class="social-base">
		 <div class="social-ribbon-link">
		   <a href="http://solepathinstitute.org/solepath-community-meetups-join-us/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-meetup-small.png" height="25px" width="25px"></a>
		   <a href="https://www.etsy.com/ca/shop/SolePantry" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-etsy-small.png" height="25px" width="25px"></a>
		   <a href="https://issuu.com/solepath" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-issuu-small.png" height="25px" width="25px"></a>
		   <a href="https://medium.com/@SolePathAnswers" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-medium-small.png" height="25px" width="25px"></a>
		   <a href="https://www.instagram.com/solepathanswers/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-instagram-small.png" height="25px" width="25px"></a>
		 </div>
	   </div>
	</div>
</div>

<div id="ribbon">
	
	<div class="inset"></div>
	
	<div class="container">
    <div class="base"><div class="ribbon-link"><a href="http://solepathinstitute.org/solepantry/">shop at the SolePantry<br>click here</a></div></div>
		<div class="left_corner"></div>
		<div class="right_corner"></div>
	</div>

</div>

</header>
<div id="header-bar" class="flex_100_np">
	<div id="header-bar-text">
		<span class="sp-path"><?php echo $thePath; ?></span>
		<span class="sp-category"><?php echo $theCategory; ?></span>
		<span class="sp-dark"><?php echo $theDark; ?></span>
	</div>
</div>

<div id="navigation" class="flex_100_np">
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
       // bcn_display();
    }?>
</div>
</div>
<div style="clear: both"></div>
