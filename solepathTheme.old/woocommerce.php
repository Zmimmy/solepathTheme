<?php 
/**
 * The template for displaying Single Page.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
 
get_header(); ?>
<div id="content-wrapper" class="flex_100_np">
	<?php get_sidebar(); ?>
	<div class="flex_66 the-big-one">

		<?php woocommerce_content(); ?>
</div>
<?php get_footer(); ?>
