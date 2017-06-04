<?php
/**

Template Name: SolePath Branches Page

 * The template for displaying SolePantry Home Page.
 *
 * @package Solepath
 * @since Solepath 1.0
 */

$sp_gallery = explode( ",", ot_get_option( 'solepantry_home_page_gallery' ) );
$test_field = ot_get_option( 'sample_text' );

get_header(); ?>
<div id="content-wrapper" class="flex_100_np">
	<?php get_sidebar(); ?>
	<div class="flex_75">
	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <div class="post" id="post-<?php the_ID(); ?>">
        <div id="branches-wrapper">
          <div id="branches-bg">

          </div>
          <div id="branches-text">
        		<h1>
        		  <?php the_title(); ?>
        		</h1>
        		<?php /* if ( function_exists('simonwpframework_breadcrumb') ) { simonwpframework_breadcrumb();  } */ ?>

        		<div class="entry">
        		  <?php the_content(); ?>
        		  <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
        		</div>
            </div>
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
