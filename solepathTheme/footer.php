<?php
/**
 * The template for Footer.
 *
 * @package Solepath
 * @since Solepath 1.0
 */
?>

<div style="clear: both"></div>
<div id="footer-wrapper">
	<div id="foot-left" class="alpha flex_25">
		<!-- empty for the moment -->
		&nbsp;
	</div>
	<div id="foot-right" class="flex_66">
		<div id="footer">
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer1") ) : ?>
		  <?php endif; ?>
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer2") ) : ?>
		  <?php endif; ?>
		  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer3") ) : ?>
		  <?php endif; ?>
		  <div style="clear: both"></div>
		  	<div class="footer-menu">
            <p>SolePath is the way to find answers to the fundamental and everyday questions of your life.</p>
            <a href="http://solepathinstitute.org/contact-us/">Contact Us</a>
            | <a href="http://solepathinstitute.org/solepath-terms-and-conditions/">Terms & Conditions</a>
            | <a href="http://solepathinstitute.org/solepath-privacy-protection-policy/">Privacy</a>
            <br />
            <p>We are located in Inglewood, Calgary, Alberta, Canada | 1.877.866.2086 | <a href="mailto:frontdesk@solepath.org">frontdesk@solepath.org</a>
            </div><br />
            &copy; 2012-<?php echo date("Y"); echo " "; ?>, Energy Mountain Inc. or it's affiliates. All rights reserved.
            SolePath is a trademark of Energy Mountain Inc. or it's affiliates.</div>
		</div>
	</div>

</div>
</div>
<?php wp_footer(); ?>
</body></html>