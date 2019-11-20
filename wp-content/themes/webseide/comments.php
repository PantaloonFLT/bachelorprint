<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div class="comments-area-background">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>


	<?php if(has_block('delucks/comments-block')){  ?>
	<div id="comments" class="comments-area webseide-comments-block comments-area">
			<h3 class="comments-title"><?php _e( 'Feedback', 'webseide' ); ?></h3>
			<ol class="commentlist">
				<?php
				webseideModules()->get('loadmore_comments')->showComments(array(
				    'post_id'       => get_the_ID(),
				    'style'      	=> 'ol',
				    'short_ping' 	=> true,
				    'callback'		=> 'webseide_comments',
				));
				?>
			</ol><!-- .comment-list -->
			<?php webseideModules()->get('loadmore_comments')->moreButton(); ?>
	</div><!-- #comments -->
	<?php } else { ?>
    	<div id="comments" class="comments-area webseide-comments-block comments-area">
    		<h3 class="comments-title"><?php _e( 'Feedback', 'webseide' ); ?></h3>


    		<ol class="commentlist">
    		<?php
    			wp_list_comments( array(
    				'style'      	=> 'ol',
    				'short_ping' 	=> true,
    				'callback'		=> 'webseide_comments',
    			) );
    		?>
    		</ol><!-- .comment-list -->

    		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    			<div class="nav-links">

    				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comments', 'webseide' ) ); ?></div>
    				<div class="nav-next"><?php next_comments_link( esc_html__( 'Comments', 'webseide' ) ); ?></div>

    			</div><!-- .nav-links -->
    		</nav><!-- #comment-nav-below -->
    		<?php endif; // Check for comment navigation. ?>
		</div>

	<?php } ?>


	<?php endif; // Check for have_comments(). ?>
	<?php comment_form(); ?>

</div>