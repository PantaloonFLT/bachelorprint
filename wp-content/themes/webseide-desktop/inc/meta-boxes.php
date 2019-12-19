<?php
/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function clymene_register_meta_boxes( $meta_boxes ) {

	$prefix = '_cmb_';
	// Post format
	$meta_boxes[] = array(
		'id'       => 'format_detail',
		'title'    => __( 'Format Details', 'clymene' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => __( 'Image', 'clymene' ),
				'id'               => $prefix . 'image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => __( 'Gallery', 'clymene' ),
				'id'    => $prefix . 'images',
				'type'  => 'image_advanced',
				'class' => 'gallery',
			),
			array(
				'name'  => __( 'Quote', 'clymene' ),
				'id'    => $prefix . 'quote_text',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'quote',
			),
			array(
				'name'  => __( 'Author', 'clymene' ),
				'id'    => $prefix . 'quote_autor',
				'type'  => 'text',
				'class' => 'quote',
			),
			array(
				'name'  => __( 'Text Link', 'clymene' ),
				'id'    => $prefix . 'link_text',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'link',
			),
			array(
				'name'  => __( 'Link', 'clymene' ),
				'id'    => $prefix . 'link_out',
				'type'  => 'text',
				'class' => 'link',
			),
			array(
				'name'  => __( 'Audio', 'clymene' ),
				'id'    => $prefix . 'link_audio',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
			),
			array(
				'name'  => __( 'Video', 'clymene' ),
				'id'    => $prefix . 'link_video',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',
			),			
		),
	);
	$meta_boxes[] = array(
		'id'       => 'pages_st',
		'title'    => __( 'Page Settings', 'clymene' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(			
			array(
				'name'             => __( 'Background Header', 'clymene' ),
				'id'               => $prefix . 'bg_pagehead',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),		
			array(
				'name'  => __( 'Title Show', 'clymene' ),
				'id'    => $prefix . 'page_title',
				'type'  => 'textarea',
				'class' => '',
			),
			array(
				'name'  => __( 'Subtitle', 'clymene' ),
				'id'    => $prefix . 'sub_title',
				'type'  => 'textarea',
				'class' => '',
			),
			array(
				'name'  => __( 'Button', 'clymene' ),
				'id'    => $prefix . 'button_title',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Button Link', 'clymene' ),
				'id'    => $prefix . 'button_link',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Icon Slide 1', 'clymene' ),
				'id'    => $prefix . 'icon1',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Text Slide 1', 'clymene' ),
				'id'    => $prefix . 'text1',
				'type'  => 'textarea',
				'class' => '',
			),
			array(
				'name'  => __( 'Icon Slide 2', 'clymene' ),
				'id'    => $prefix . 'icon2',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Text Slide 2', 'clymene' ),
				'id'    => $prefix . 'text2',
				'type'  => 'textarea',
				'class' => '',
			),
			array(
				'name'  => __( 'Icon Slide 3', 'clymene' ),
				'id'    => $prefix . 'icon3',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Text Slide 3', 'clymene' ),
				'id'    => $prefix . 'text3',
				'type'  => 'textarea',
				'class' => '',
			),

		),
	);
	$meta_boxes[] = array(
		'id'       => 'testi_st',
		'title'    => __( 'Testimonial Settings', 'clymene' ),
		'pages'    => array( 'testimonial' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(			
			array(
				'name'  => __( 'Job', 'clymene' ),
				'id'    => $prefix . 'job_testi',
				'type'  => 'text',
				'class' => '',
			),	
		),
	);
	$meta_boxes[] = array(
		'id'       => 'team_st',
		'title'    => __( 'Team Details', 'clymene' ),
		'pages'    => array( 'team' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(			
			array(
				'name'  => __( 'Job', 'clymene' ),
				'id'    => $prefix . 'job_team',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Social 1', 'clymene' ),
				'id'    => $prefix . 'soc1',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Link Social 1', 'clymene' ),
				'id'    => $prefix . 'link1',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Social 2', 'clymene' ),
				'id'    => $prefix . 'soc2',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Link Social 2', 'clymene' ),
				'id'    => $prefix . 'link2',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Social 3', 'clymene' ),
				'id'    => $prefix . 'soc3',
				'type'  => 'text',
				'class' => '',
			),
			array(
				'name'  => __( 'Link Social 3', 'clymene' ),
				'id'    => $prefix . 'link3',
				'type'  => 'text',
				'class' => '',
			),
		),
	);
	$meta_boxes[] = array(
		'id'       => 'folio_st',
		'title'    => __( 'Work Settings', 'clymene' ),
		'pages'    => array( 'portfolio' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
                'name' => 'Excerpt Project',
                'desc' => 'excerpt display in portfolio page',
                'id'   => $prefix . 'excerpt_folio',
                'type' => 'textarea',
            ), 
            array(
                'name' => __( 'Link Video Popup', 'cmb' ),
                'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/embed/eP2VWNtU5rw or http://player.vimeo.com/video/20249835', 'cmb' ),
                'id'   => $prefix . 'folio_video',
                'type' => 'text'
            ),	
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'clymene_register_meta_boxes' );

/**
 * Enqueue scripts for admin
 *
 * @since  1.0
 */
function clymene_admin_enqueue_scripts( $hook ) {
	// Detect to load un-minify scripts when WP_DEBUG is enable
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_script( 'clymene-backend-js', get_template_directory_uri()."/js/admin.js", array( 'jquery' ), '1.0.0', true );
	}
}

add_action( 'admin_enqueue_scripts', 'clymene_admin_enqueue_scripts' );
