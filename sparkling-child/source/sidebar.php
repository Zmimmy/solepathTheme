<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package sparkling
 */
?>
</div>
<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
    <div class="well">
        <?php do_action('before_sidebar'); ?>

        <aside id="sp-membership" class="widget sp-membership-widget">
            <?php if (is_user_logged_in()) : ?>
                <div class="logged-in-content">
                    <p>Hello <span class="firstName"></span>,</p>
                    <ul>
                        <li>Your joyful LightPath is <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=501" class="joy-cat-link"><span
                                    class="joy-cat-name"></span></a> <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=401"
                                                                        class="joy-path-link"><span class="joy-path-name"></span></a></li>
                        <li>Your progression LightPath is <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=301" class="pro-cat-link"><span
                                    class="pro-cat-name"></span></a> <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=201"
                                                                        class="pro-path-link"><span class="pro-path-name"></span></a></li>
                        <li>Your DarkPath is <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=701" class="dark-cat-link"><span
                                    class="dark-cat-name"></span></a> <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=301"
                                                                         class="dark-path-link"><span class="dark-path-name"></span></a></li>
                        <li>Your governing SoleNumber is <a href="https://membership.solepathinstitute.org/account/?action=mysolepathmain&button=3&msppage=801" class="gov-cat-link"><span
                                    class="gov-number"></span>: <span class="gov-number-name"></span></a></li>
                    </ul>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </div>

            <?php else : ?>
                <div class="logged-out-content">
                    <p>Welcome to My SolePath</p>
                    <a href="https://membership.solepathinstitute.org/login/" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                </div>

            <?php endif; ?>
        </aside>

        <?php if (false && is_user_logged_in()) : ?>
            <aside id="sp-membership-i-am" class="widget sp-membership-i-am-widget">
                <i class="fa fa-quote-left fa-2x fa-pull-left" aria-hidden="true"></i>
                <h3 class="i-am-statement"></h3>
            </aside>
        <?php endif; ?>

        <?php if (!dynamic_sidebar('sidebar-1')) : ?>

            <aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>

            <aside id="archives" class="widget">
                <h3 class="widget-title"><?php esc_html_e('Archives', 'sparkling'); ?></h3>
                <ul>
                    <?php wp_get_archives(array('type' => 'monthly')); ?>
                </ul>
            </aside>

            <aside id="meta" class="widget">
                <h3 class="widget-title"><?php esc_html_e('Meta', 'sparkling'); ?></h3>
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </aside>

        <?php endif; // end sidebar widget area ?>
    </div>
</div><!-- #secondary -->
