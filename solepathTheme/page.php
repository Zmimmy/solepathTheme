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
	<div class="flex_66">
	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <div class="post" id="post-<?php the_ID(); ?>">
		<h1>
		  <?php the_title(); ?>
		</h1>
		<?php /* if ( function_exists('simonwpframework_breadcrumb') ) { simonwpframework_breadcrumb();  } */ ?>
		<div class="entry">
		  <?php the_content(); ?>
		  <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		</div>
		<div class="postmetadata">
			<?php get_template_part( '/inc/meta' );?>

		</div>
	  </div>
	  <div id="comment-block">
	<?php comments_template(); ?>
	</div>
	</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
