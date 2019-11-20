<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

?>

<?php
	if(get_post_meta( get_the_ID(), 'redirect', true ) != ''){
		header('HTTP/1.1 301 Moved Permanently');
		header('Location:'.get_post_meta( get_the_ID(), 'redirect', true ));
		exit;
	}
?>

<?php $caption = get_post( get_post_thumbnail_id() ); ?>

<div class="blogdetailcontent">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="fullthumbnail">
                <?php if (get_theme_mod( 'webseide_limitimagewidth' ) == '1'):?>
                    <?php echo get_the_post_thumbnail( $page->ID, 'webseide_large' ); ?>
                <?php else : ?>
                    <?php the_post_thumbnail(); echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
                <?php endif; ?>
			</div>
			<?php if (is_object($caption) && $caption->post_excerpt) : ?>
				<p class="caption"><?php echo $caption->post_excerpt; ?></p>
			<?php endif; ?>
		<?php endif; ?>


        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php echo function_exists('dpc_metadescription') ? dpc_metadescription() : ''; ?>
            <div class="entry-meta">
                <?php webseide_posted_on(); ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
        
        <?php
			if ( is_active_sidebar( 'above_blogpost' ) ){
				dynamic_sidebar( 'above_blogpost' );
			}
		?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

		<?php
			if ( is_active_sidebar( 'below_blogpost' ) ){
				dynamic_sidebar( 'below_blogpost' );
			}
		?>

        <footer class="entry-footer">
            <?php webseide_entry_footer(); ?>
        </footer><!-- .entry-footer -->

    </article><!-- #post-## -->
</div>