<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package webseide
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
                
                <?php if ( get_theme_mod( '404_image' ) ) : ?>
                    <div class="fullthumbnail">
                        <img src="<?php echo get_theme_mod( '404_image' ); ?>">
                    </div>
	            <?php endif; ?>
            
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry! The requested page can&rsquo;t be found.', 'webseide' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Please try our keyword search to find the page you were looking for.', 'webseide' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
