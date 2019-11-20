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

	</div><!-- #content -->

    <?php if ( is_active_sidebar( 'bottom_right' ) ) : ?>
        <div id="bottom_right" role="complementary">
            <?php dynamic_sidebar( 'bottom_right' ); ?>
        </div>
    <?php endif; ?>

	<div id="overallfooter">
	<footer id="colophon" class="site-footer <?php echo get_theme_mod( 'webseide_footerfontstyle' ); ?>" role="contentinfo">
 		<div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
                  <div id="footer_left" class="widget-area alignleft" role="complementary">
                      <?php dynamic_sidebar( 'footer_left' ); ?>
                  </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
                  <div id="footer_right" class="widget-area alignright" role="complementary">
                      <?php dynamic_sidebar( 'footer_right' ); ?>
                  </div>
            <?php endif; ?>
 		</div>

        <div class="footermenu">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
		</div>

		<div class="socket">
			<?php dynamic_sidebar( 'primary' ); ?>
		</div>

	</footer><!-- #colophon -->
    </div><!-- #overallfooter -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
