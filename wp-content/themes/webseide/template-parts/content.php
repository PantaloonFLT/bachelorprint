<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

$post_ID 		= get_the_ID();
$showBGImage 	= false;
if(has_post_thumbnail() && ( is_sticky($post_ID) || has_post_format( 'image' , $post_ID ) )){
	$showBGImage 	= true;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        
        <?php if(get_theme_mod('webseide_thumbnailsonblogview')) { ?>
            <div class="webseide_blogview_thumbnail"><?php the_post_thumbnail('webseide_thumbnail'); ?></div>
        <? } ?>

        <div class="<?php if(get_theme_mod('webseide_thumbnailsonblogview')) echo(thumbnailsactive) ?>">
            <header class="entry-header">

                <?php
                    if(get_post_meta( $post_ID, 'redirect', true ) != ''){
                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" title="Extern" target="_blank" rel="bookmark">', esc_url( get_post_meta( $post_ID, 'redirect', true ) ) ), '</a></h3>' );
                    }else{
                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                    }
                ?>

            </header><!-- .entry-header -->

            <section>
                <?php if(get_the_excerpt( $post_ID ) != '') : ?>
                    <p class="webseide-post-excerpt">
                        <?php if(function_exists('dpc_metadescription_loop')) : ?>
                            <?php echo dpc_metadescription_loop()?>
                        <?php else : ?>
                            <?php echo excerpt(20); ?>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </section>

            <footer>
                <?php if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php webseide_posted_on(); ?>
                        <?php if(get_theme_mod('webseide_post_showcategory')) { ?>
                            <?php the_category( ' ' ); ?>
                        <? } ?>
                    </div>
                <?php endif; ?>
            </footer>
        </div>
</article><!-- #post-## -->
