<?php

/**
 * SolePath new home page
 */

get_header( "home" );
?>
    <div class="container main-content-area">
        <div class="row">
            <div class="side-bar-left col-sm-6 col-md-4">
	            <?php get_sidebar( "home-left" ); ?>
            </div>

            <div class="main-content-inner col-sm-12 col-md-4">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								?>
                                <div class="post-inner-content">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <div class="entry-content">
											<?php
											the_content();
											wp_link_pages(
												array(
													'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sparkling' ),
													'after'  => '</div>',
												)
											);
											?>
                                        </div><!-- .entry-content -->

										<?php if ( get_edit_post_link() ) : ?>
                                            <footer class="entry-footer">
												<?php
												edit_post_link(
													sprintf(
													/* translators: %s: Name of current post */
														esc_html__( 'Edit %s', 'sparkling' ),
														the_title( '<span class="screen-reader-text">"', '"</span>', false )
													),
													'<i class="fa fa-edit"></i><span class="edit-link">',
													'</span>'
												);
												?>
                                            </footer><!-- .entry-footer -->
										<?php endif; ?>
                                    </article><!-- #post-## -->
                                </div>
                                <?php

							endwhile;

							if ( function_exists( 'wp_pagenavi' ) ) {
								wp_pagenavi();
							} else {
								the_posts_pagination(
									array(
										'prev_text' => '<i class="fa fa-chevron-left"></i> ' . __( 'Newer posts', 'sparkling' ),
										'next_text' => __( 'Older posts', 'sparkling' ) . ' <i class="fa fa-chevron-right"></i>',
									)
								);
							}

						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <div class="side-bar-right col-sm-6 col-md-4">
	            <?php get_sidebar( "home-right" ); ?>
            </div>
        </div>
    </div>
<div class="testimonials-wrapper">
    <div id="testimonials" class="container">
        <div class="row">
            <div class="testimonal-block tblock-1 col-sm-12 col-md-6">
	            <?php if ( is_active_sidebar( 'testimonial-1' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'testimonial-1' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
            <div class="testimonal-block tblock-2 col-sm-12 col-md-6">
	            <?php if ( is_active_sidebar( 'testimonial-2' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'testimonial-2' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="testimonal-block tblock-1 col-sm-12 col-md-6">
	            <?php if ( is_active_sidebar( 'testimonial-3' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'testimonial-3' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
            <div class="testimonal-block tblock-2 col-sm-12 col-md-6">
	            <?php if ( is_active_sidebar( 'testimonial-4' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'testimonial-4' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="book-wrapper">
    <div id="book" class="container">
        <div class="row">
            <div class="col-sm-12 col-md-1">&nbsp;</div>
            <div class="book-cover col-sm-12 col-md-4">
	            <?php if ( is_active_sidebar( 'book-image' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'book-image' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
            <div class="book-info col-sm-12 col-md-6">
	            <?php if ( is_active_sidebar( 'book-text' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
			            <?php dynamic_sidebar( 'book-text' ); ?>
                    </div><!-- LEFT .widget-area .first -->
	            <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-1">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-1">&nbsp;</div>
            <div class="book-info col-sm-12 col-md-6">
                <?php if ( is_active_sidebar( 'book-text2' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
                        <?php dynamic_sidebar( 'book-text2' ); ?>
                    </div><!-- LEFT .widget-area .first -->
                <?php endif; ?>
            </div>
            <div class="book-cover col-sm-12 col-md-4">
                <?php if ( is_active_sidebar( 'book-image2' ) ) : ?>
                    <div class="testimonial-widget" role="complementary">
                        <?php dynamic_sidebar( 'book-image2' ); ?>
                    </div><!-- LEFT .widget-area .first -->
                <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-1">&nbsp;</div>
        </div>
    </div>
</div>
<?php
get_footer();
