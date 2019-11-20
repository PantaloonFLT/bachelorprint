<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php echo __( 'Nothing Found', 'webseide' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'webseide' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php echo __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'webseide' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php echo __( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'webseide' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
