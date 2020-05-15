<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'chld_thm_cfg_parent_css' ) ):
	function chld_thm_cfg_parent_css() {
		wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(
			'sparkling-bootstrap',
			'sparkling-icons'
		) );
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
	wp_enqueue_script( 'main-sp-script', get_stylesheet_directory_uri() . '/js/main-sp-script.js', array( 'jquery' ), 1.1, true );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function solepath_sparkling_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Testimonial 1', 'sparkling' ),
			'id' => 'testimonial-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Testimonial 2', 'sparkling' ),
			'id' => 'testimonial-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Testimonial 3', 'sparkling' ),
			'id' => 'testimonial-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Testimonial 4', 'sparkling' ),
			'id' => 'testimonial-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Book Image', 'sparkling' ),
			'id' => 'book-image',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'Book Text', 'sparkling' ),
			'id' => 'book-text',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
    register_sidebar(
        array(
            'name' => esc_html__( 'Book Image Two', 'sparkling' ),
            'id' => 'book-image2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__( 'Book Text Two', 'sparkling' ),
            'id' => 'book-text2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}

add_action( 'widgets_init', 'solepath_sparkling_widgets_init' );

class solepath_testimonial_Widget extends WP_Widget {
	// Set up the widget name and description.
	public function __construct() {
		$widget_options = array( 'classname' => 'testimonial_widget', 'description' => 'This is an testimonial Widget which should be displayed on the front page' );
		parent::__construct( 'testimonial_widget', 'SolePath testimonial Widget', $widget_options );
	}
	// Create the widget output.
	public function widget( $args, $instance ) {
//		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		echo $args['before_widget']; ?>
		<p class="testimonial-text"><?php echo $instance['testimonial']; ?></p>
		<p class="testimonial-person">~ <?php echo $instance['person']; ?></p>
		<?php echo $args['after_widget'];
	}

	// Create the admin area widget settings form.
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$testimonial = ! empty( $instance['testimonial'] ) ? $instance['testimonial'] : '';
		$person = ! empty( $instance['person'] ) ? $instance['person'] : '';

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'testimonial' ); ?>">Title:</label>
			<textarea id="<?php echo $this->get_field_id( 'testimonial' ); ?>" name="<?php echo $this->get_field_name( 'testimonial' ); ?>" rows="4"><?php echo esc_attr( $testimonial ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'person' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'person' ); ?>" name="<?php echo $this->get_field_name( 'person' ); ?>" value="<?php echo esc_attr( $person ); ?>" />
		</p>
		<?php
	}
	// Apply settings to the widget instance.
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'testimonial' ] = strip_tags( $new_instance[ 'testimonial' ] );
		$instance[ 'person' ] = strip_tags( $new_instance[ 'person' ] );
		return $instance;
	}
}
// Register the widget.
function solepath_register_testimonial_widget() {
	register_widget( 'solepath_testimonial_Widget' );
}
add_action( 'widgets_init', 'solepath_register_testimonial_widget' );
