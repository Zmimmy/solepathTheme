<?php
/**
 * The LEFT Sidebar widget area for Solepath Homepage
 *
 * @package sparkling
 */
?>

<?php
// If footer sidebars do not have widget let's bail.

if ( ! is_active_sidebar( 'home-widget-1' ) ) {
	return;
}
// If we made it this far we must have widgets.
?>

<div class="home-widget-area home-widget-area-left">
	<?php if ( is_active_sidebar( 'home-widget-1' ) ) : ?>
		<div class="home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-widget-1' ); ?>
		</div><!-- LEFT .widget-area .first -->
	<?php endif; ?>
</div>