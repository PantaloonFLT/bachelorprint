<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<div class="fullthumbnail">
        <?php if (get_theme_mod( 'webseide_limitimagewidth' ) == '1'):?>
            <?php echo get_the_post_thumbnail( $page->ID, 'webseide_large' ); ?>
        <?php else : ?>
		    <?php the_post_thumbnail(); echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
        <?php endif; ?>
	</div>
	<?php endif; ?>

    <div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
