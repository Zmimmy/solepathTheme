<?php
/**
 * The template for Function. Make changes at your own risk.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
 
add_theme_support( 'woocommerce' );
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

add_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args = array(
		'post_type'        		=> 'product',
		'no_found_rows'    		=> 1,
		'posts_per_page'   		=> 4,
		'ignore_sticky_posts' 	=> 1,

		'post__not_in'        	=> array($product->id)
	);
	return $args;
}
add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );


// Redefine woocommerce_output_related_products()
//function woocommerce_output_related_products() {
//	woocommerce_related_products(1,4);
//}

function simonwpframework_setup(){
	// Add RSS links to <head> section
		add_theme_support( 'automatic-feed-links' );
			
	// Add Custom BG
		add_theme_support( 'custom-background' );
	
	// Enable post thumbnails
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(200, 200, true);

	// ADD POST FORMATS
		add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

	// Editor Support
		add_editor_style();
		
	// Add Thumnail Support
		add_theme_support( 'post-thumbnails' );
		
	// Set Content Width
		$content_width = 728;
}
add_action( 'after_setup_theme', 'simonwpframework_setup' );

	
// Add Bread Crumbs
function simonwpframework_breadcrumb() {
	echo bloginfo('name');
	if (!is_front_page()) {
		echo ' <a href="';
		echo home_url();
		echo '">Home';
		echo "</a> / ";
		if (is_category() || is_single()) {
			the_category(' ');
			if (is_single()) {
				echo " / ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
	else {
		echo 'Home';
	}
}

// Add Widgets
function simonwpframework_widgets_init() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => 'Main Sidebar',
		'before_widget' => '<div class="flex_100">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-1',
		'name' => 'Footer1',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-2',
		'name' => 'Footer2',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-3',
		'name' => 'Footer3',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action ( 'widgets_init', 'simonwpframework_widgets_init' );


// Add Template for comments and pingbacks

	if ( ! function_exists( 'simonwpframework_comment' ) ) :

function simonwpframework_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard"> <?php echo get_avatar( $comment, 40 ); ?> <?php printf( __( '%s <span class="says">says:</span>', 'simonwpframework' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> </div>
    <!-- .comment-author .vcard -->
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation">
    <?php echo 'Your comment is awaiting moderation.' ?>
    </em> <br />
    <?php endif; ?>
    <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
      <?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'simonwpframework' ), get_comment_date(),  get_comment_time() ); ?>
      </a>
      <?php edit_comment_link( __( '(Edit)', 'simonwpframework' ), ' ' );
			?>
    </div>
    <!-- .comment-meta .commentmetadata -->
    
    <div class="comment-body">
      <?php comment_text(); ?>
    </div>
    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <!-- .reply --> 
  </div>
  <!-- #comment-##  -->
  
  <?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
<li class="post pingback">
  <p>
    <?php echo 'Pingback:' ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'simonwpframework' ), ' ' ); ?>
  </p>
  <?php
			break;
	endswitch;
}
endif;


if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'pantry-gallery-image', 350, 350, true ); //(cropped)
}
add_filter('image_size_names_choose', 'my_image_sizes');
  function my_image_sizes($sizes) {
  $addsizes = array(
    "new-size" => __( "New Size")
  );
  $newsizes = array_merge($sizes, $addsizes);
  return $newsizes;
}


//Register hook to load scripts
add_action('wp_enqueue_scripts', 'solepath_load_scripts');

//Load scripts (and/or styles)
function solepath_load_scripts(){

  if ( is_page() ) { //Check if we are viewing a page
    global $wp_query;
    //Check which template is assigned to current page we are looking at
    $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
    if( $template_name == 'solepantry-home-page.php' ) {
      wp_enqueue_style( 'jq-scrolling-banner-css', get_template_directory_uri() .'/scroll-banner/jqbanner.css' );
      wp_enqueue_script( 'jq_scrolling_banner', get_template_directory_uri() .'/scroll-banner/jquery.cycle.all.js' );
    }
  }
}

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
 
function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
 
	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
 
}
?>