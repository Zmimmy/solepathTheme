<?php
/**
 * The RIGHT Sidebar widget area for Solepath Homepage
 *
 * @package sparkling
 */
?>

<?php
// If footer sidebars do not have widget let's bail.

if ( ! is_active_sidebar( 'home-widget-2' ) && ! is_active_sidebar( 'home-widget-3' ) ) {
	return;
}
// If we made it this far we must have widgets.
?>

<div class="home-widget-area home-widget-area-right">

	<?php if ( is_active_sidebar( 'home-widget-2' ) ) : ?>
		<div class="home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-widget-2' ); ?>
		</div><!-- RIGHT .widget-area .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'home-widget-3' ) ) : ?>
		<div class="home-widget" role="complementary">
			<?php dynamic_sidebar( 'home-widget-3' ); ?>
		</div><!-- RIGHT .widget-area .second -->
	<?php endif; ?>
</div>