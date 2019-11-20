<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php echo get_post_meta( get_the_ID(), 'external_link_url', true ); ?>" title="Extern" target="_blank" rel="bookmark">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</a>
		
		
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php webseide_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    	<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
