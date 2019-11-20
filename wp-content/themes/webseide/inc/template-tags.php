<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package webseide
 */

if ( ! function_exists( 'webseide_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function webseide_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'webseide' ),
		$time_string
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'webseide' ),
		'<span class="author">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="byline">' . $byline . '</span> <span class="posted-on">' . $posted_on .'</span>';

}
endif;

if ( ! function_exists( 'webseide_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function webseide_entry_footer() {
	// Category and tags
	
	$categories_list = get_the_category_list( );
	//$categories_list = get_the_category_list( esc_html__() );
	if ( $categories_list && webseide_categorized_blog() ) {
		printf( '<span class="cat-links">' . esc_html__( '%1$s', 'webseide' ) . '</span>', $categories_list );
	}

	$tags_list = get_the_tag_list( );
	if ( $tags_list ) {
		printf( '<span class="tags-links">' . esc_html__( '%1$s', 'webseide' ) . '</span>', $tags_list );
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'webseide' ), esc_html__( '1 Comment', 'webseide' ), esc_html__( '% Comments', 'webseide' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'webseide' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function webseide_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'webseide_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'webseide_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so webseide_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so webseide_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in webseide_categorized_blog.
 */
function webseide_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'webseide_categories' );
}
add_action( 'edit_category', 'webseide_category_transient_flusher' );
add_action( 'save_post',     'webseide_category_transient_flusher' );
