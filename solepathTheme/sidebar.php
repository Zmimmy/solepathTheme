<?php
/**
 * The template for Sidebar.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
?>

<div class="alpha flex_25">
  <div id="sidebar">
    <!-- begin widget sidebar -->
    <div class="button button-sidebar tall-button" onClick="window.location.href='http://solepathinstitute.org/request-your-solepath-energy-analysis/solepath-energy-analysis-for-people/';" style="cursor:pointer;">Order Your SolePath</div>
    <div class="button button-sidebar daily-divination" onClick="window.location.href='http://solepathinstitute.org/contact-us/';" style="cursor:pointer;">Book an Appointment</div>
    <div class="button button-sidebar-smaller w-and-r" onClick="window.location.href='http://solepathinstitute.org/contact-us/workshops-and-retreats/';" style="cursor:pointer;">Classes, Workshops & Discussion Groups</div>
<div style="clear: both;"></div>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Sidebar') ) : ?>
 	<div class="no-widgets">
      <div id="pages" class="flex_100">
        <h2>Pages</h2>
        <ul>
          <?php wp_list_pages('title_li='); ?>
        </ul>
      </div>
      <div id="archives" class="flex_100">
        <h2>Archives</h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </div>
      <div class="clear"></div>
      <div id="categories" class="flex_100">
        <h2>Categories</h2>
        <ul>
          <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
      </div>
      <div id="blogroll" class="flex_100">
        <ul>
          <?php wp_list_bookmarks(); ?>
        </ul>
      </div>
      <div class="clear"></div>
      <div id="sidebarmeta" class="flex_100">
        <h2>Meta</h2>
        <ul>
          <?php wp_register(); ?>
          <li>
            <?php wp_loginout(); ?>
          </li>
          <?php wp_meta(); ?>
        </ul>
      </div>
      <div id="feeds" class="flex_100">
        <h2>Feeds</h2>
        <ul>
          <li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
          <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
        </ul>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
