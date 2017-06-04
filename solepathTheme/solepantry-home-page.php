<?php
/**

Template Name: SolePantry Home Page

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
	<div class="flex_66">
	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <div class="post" id="post-<?php the_ID(); ?>">

          <div id="jqb_object">
            <div class="jqb_slides">
              <?php
                $i = count( $sp_gallery );
                $cur = 0;
                  foreach ( $sp_gallery as $id ) {
                      $img_data = wp_get_attachment_image_src( $id, "pantry-gallery-image" );
                      $url = get_post_field( '_wp_attachment_image_alt', $id );
                      $caption = get_post_field( 'post_excerpt', $id );
                      $descrp = get_post_field( 'post_content', $id );
                      echo '<div class="jqb_slide" title="' . $caption . '" >';
                      echo '<div class="jqb_inner_img"><a href="' . $url . '"><img src="' . $img_data[0] . '"></a></div>';
                      echo '<div class="jqb_inner_text"><h1>' . $caption . '</h1><span>' . $descrp . '<br><a href="' . $url . '">See More ...</a></span></div>';
                      echo '<div class="scroll-nav">';
                      for ( $j = 0; $j < $i; $j++ ) {
                        echo '<div class="';
                        echo "goto$j";
                        if ( $cur == $j ) {
                          echo " active";
                        }
                        echo '"></div>';
                      }
                      echo '</div>';
                      echo '</div>';
                      $cur++;
                  }
             ?>
            </div>
          </div>


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
