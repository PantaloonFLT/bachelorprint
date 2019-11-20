<?php
/**
 * Gutenberg File.
 *
 * @package webseide
 */

function webseide_comments_block() {
	// Scripts.
	wp_register_script(
		'webseide-comments-block-script', // Handle.
		get_template_directory_uri() . '/inc/gutenberg/block-comments/block.js', // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-element', 'wp-i18n' ) // Dependencies, defined above.
	);
	// Styles.
	wp_register_style(
		'webseide-comments-block-editor-style', // Handle.
		get_template_directory_uri() . '/inc/gutenberg/block-comments/editor.css', // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
	wp_register_style(
		'webseide-comments-block-frontend-style', // Handle.
		get_template_directory_uri() . '/inc/gutenberg/block-comments/style.css', // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
	
	// Here we actually register the block with WP, again using our namespacing
	// We also specify the editor script to be used in the Gutenberg interface
	register_block_type( 'webseide/comments', array(
		'editor_script' => 'webseide-comments-block-script',
		'editor_style' 	=> 'webseide-comments-block-editor-style',
		'style' 		=> 'webseide-comments-block-frontend-style',
	) );
} // End function organic_profile_block().
// Hook: Editor assets.
add_action( 'init', 'webseide_comments_block' );