<?php 
/**
 * The template for displaying Single Posts.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
get_header(); ?>
<div id="content-wrapper">
	<?php get_sidebar(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="flex_66">

	  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	  <div class="bread-crumb"><?php simonwpframework_breadcrumb();?></div>

		<h1>
		  <?php the_title(); ?>
		</h1>
		<div class="entry">
		  <?php the_content(); ?>
		</div>
		<div class="postmetadata">
			<?php get_template_part( '/inc/meta' );?>

		  <span class="categories">Filed Under:
		  <?php the_category(', '); ?>
		  </span>
		  <?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?>
		</div>
	  </div>
	<div id="comment-block">
	<?php comments_template(); ?>
	</div>
	<?php endwhile; endif; ?>
	<div><?php wp_link_pages(); ?></div>
	</div>
</div>
<?php get_footer(); ?>
