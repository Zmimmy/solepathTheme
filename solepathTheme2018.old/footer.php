<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->

	<div id="footer-area">
        <div class="footer-area-inner-wrapper">
        <div class="footer-rainbow"></div>
            <div class="container footer-inner">
                <div class="row">
                    <?php get_sidebar( 'footer' ); ?>
                </div>
            </div>

            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="site-info container">
                    <div class="row">
                        <?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>
                        <nav role="navigation" class="col-md-6">
                            <?php sparkling_footer_links(); ?>
                        </nav>
                        <div class="copyright col-md-6">

                        </div>
                    </div>
                </div><!-- .site-info -->
                <div class="container">
                    <div class="row">
                        <div class="copyright col-sm-12">
                            © 2012-<?php echo date("Y"); ?> , Energy Mountain Inc. or it's affiliates. All rights reserved. SolePath is a trademark of Energy Mountain Inc. or it's affiliates.
                        </div>
                    </div>
                </div>
                <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
            </footer><!-- #colophon -->
        </div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
