<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webseide
 */
if ((!function_exists('is_product') || !is_product()) && !has_block('delucks/comments-block')){
    comments_template();
}
?>

	<?php if ( is_active_sidebar( 'above_footer' ) ) : ?>
        <div class="above-footer" role="complementary">
            <?php dynamic_sidebar( 'above_footer' ); ?>
        </div>
    <?php endif; ?>

    </div><!-- #content -->

    <?php if ( is_active_sidebar( 'bottom_right' ) ) : ?>
        <div id="bottom_right" role="complementary">
            <?php dynamic_sidebar( 'bottom_right' ); ?>
        </div>
    <?php endif; ?>

    <div id="overallfooter">

	<footer id="colophon" class="site-footer <?php echo get_theme_mod( 'webseide_footerfontstyle' ); ?>" role="contentinfo">

		<div class="footer-widgets">
			<?php dynamic_sidebar( 'primary' ); ?>
		</div>

        <div class="footermenu">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</div>

	</footer><!-- #colophon -->
    </div><!-- #overallfooter -->

    <p class="bp-footer-copyright">&copy; Copyright <?php echo date("Y"); ?> by BachelorPrint</p>

</div><!-- #page -->

<?php wp_footer(); ?>
	<a href="#" class="scroll-to-top" style="display: none;"><span class="lnr lnr-chevron-up"></span></a>

    <script>
		document.addEventListener('DOMContentLoaded', function() {
            if(bpLocalize && bpLocalize.configurator && bpLocalize.configurator['config_' + bpLocalize.langCode]){
            	window.tlsShopUrl = bpLocalize.configurator['config_' + bpLocalize.langCode].tlsShopUrl;
            	window.tlsSubShopUrl = bpLocalize.configurator['config_' + bpLocalize.langCode].tlsSubShopUrl;
            }

            window.tlsMainConfig = {
                shopUrl: window.tlsShopUrl || '',
                subShopUrl: window.tlsSubShopUrl || '',
                elementId: 'bp-configurator',
                offsetBlockId: 'bp-header',
                feedbackId: 'auorg-bg',
                redirectUrl: window.tlsRedirectUrl || '',
                frameStartHeight: 500
            };

            var tlsMainScript = document.createElement('script');
            tlsMainScript.onload = function () {
            	window.tlsMainFrameApp && window.tlsMainFrameApp.init();
            };
            tlsMainScript.onerror = function () {
            	console.log('System error! Can not load configurator!');
            };
            tlsMainScript.src = tlsMainConfig.shopUrl + '/custom/plugins/ZinitBachelorprint/Resources/views/frontend/_public/src/js/main_frame_inject.js?v=1.2.0';
            document.body.appendChild(tlsMainScript);
		});
	</script>
</body>
</html>