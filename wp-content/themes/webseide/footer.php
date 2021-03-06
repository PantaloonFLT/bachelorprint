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

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
