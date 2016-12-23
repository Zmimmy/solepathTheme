<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package sparkling
 */
?>
</div>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
		<div class="well">
			<?php do_action( 'before_sidebar' ); ?>
			
			<aside id="sp-membership" class="widget sp-membership-widget">
				<?php if ( is_user_logged_in() ) : ?>
					<div class="logged-in-content">
						<p>Hello <span class="firstName">The Name</span>,</p>
						<ul>
							<li>Joyful Path: <a href="#" class="joy-cat-link"><span class="joy-cat-name">JoyCat</span></a> <a href="#" class="joy-path-link"><span class="joy-path-name">JoyPath</span></a></li>
							<li>Pro Path: <a href="#" class="pro-cat-link"><span class="pro-cat-name">ProCat</span></a> <a href="#" class="pro-path-link"><span class="pro-path-name">ProPath</span></a></li>
							<li>Dark Path: <a href="#" class="dark-cat-link"><span class="dark-cat-name">DarkCat</span></a> <a href="#" class="dark-path-link"><span class="dark-path-name">DarkPath</span></a></li>
						</ul>
						<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
					</div>
				
				<?php else : ?>
					<div class="logged-out-content">
						<a href="http://membership-staging.solepathinstitute.org/login/" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
					</div>
				
				<?php endif; ?>
			</aside>
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php esc_html_e( 'Archives', 'sparkling' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php esc_html_e( 'Meta', 'sparkling' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div>
	</div><!-- #secondary -->
