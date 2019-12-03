<?php
/**
 * webseide functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webseide
 */

if ( ! function_exists( 'webseide_setup' ) ) :

require_once locate_template('/lib/required_plugins.php');

// Initialize the update checker
require 'theme-updates/theme-update-checker.php';
$webseide_update_checker = new ThemeUpdateChecker(
    'webseide',
    'http://websei.de/wp-update-server/?action=get_metadata&slug=webseide'
);

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function webseide_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on webseide, use a find and replace
	 * to change 'webseide' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'webseide', get_template_directory() . '/languages' );
	load_theme_textdomain( 'js_composer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "custom-header" );


    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	if (function_exists( 'add_theme_support' )){
        add_theme_support( 'post-thumbnails' );

        if($webseide_max_width = get_theme_mod('webseide_max_width')){
            $small = (int)$webseide_max_width / 3;
            $smallwidth = (int)$small / 1.3;
            $medium = (int)$webseide_max_width / 2;

            add_image_size( 'webseide_thumbnail', $small, $smallwidth, array( 'middle', 'middle' ) ); // Thumbnail (default 150px x 150px max)
            add_image_size( 'webseide_medium', $medium, 9999 );  // Medium resolution (default 300px x 300px max)
            add_image_size( 'webseide_large', $webseide_max_width, 9999);  // Large resolution (default 1024px x 1024px max)
        }
	}

	/*
	 * Set up image dimensions
	 */

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'webseide' ),
		'footer' => esc_html__( 'Footer Menu', 'webseide' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'webseide_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // webseide_setup
add_action( 'after_setup_theme', 'webseide_setup' );

function webseide_adminhack_style() {
	if(!has_post_format('link')){
		echo '<style>#wppf_link_metabox {display: none;}</style>';
	}
}
add_action('admin_head', 'webseide_adminhack_style');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webseide_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webseide_content_width', 760 );
}
add_action( 'after_setup_theme', 'webseide_content_width', 0 );

// Widgets
function webseide_widgets_init() {

    register_sidebar( array(
		'name'          => 'Extra header',
		'id'            => 'headstrip',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Header right',
		'id'            => 'header_right',
		'before_widget' => '',
		'after_widget'  => '',

	) );

    register_sidebar( array(
		'name'          => 'Above blog',
		'id'            => 'above_blog',
		'before_widget' => '',
		'after_widget'  => '',
        'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	) );

    register_sidebar( array(
		'name'          => 'Above category',
		'id'            => 'above_category',
		'before_widget' => '',
		'after_widget'  => '',
        'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	) );

    register_sidebar( array(
		'name'          => 'Above blog post',
		'id'            => 'above_blogpost',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Below blog post',
		'id'            => 'below_blogpost',
		'before_widget' => '<div id="below_blogpost" class="below_blogpost %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
		'name'          => 'Above WooCommerce',
		'id'            => 'above_woocommerce',
		'before_widget' => '<div class="woocommerce-widget">',
		'after_widget'  => '</div>',
	) );

    register_sidebar( array(
		'name'          => 'Below WooCommerce',
		'id'            => 'below_woocommerce',
		'before_widget' => '<div class="woocommerce-widget">',
		'after_widget'  => '</div>',
	) );

    register_sidebar( array(
		'name'          => 'Bottom right (fixed)',
		'id'            => 'bottom_right',
		'before_widget' => '',
		'after_widget'  => '',
	) );

    register_sidebar( array(
		'name'          => 'Above footer',
		'id'            => 'above_footer',
		'before_widget' => '',
		'after_widget'  => '',
	) );

	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'primary',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',

	) );

    add_filter('widget_title','remove_widget_title');
	function remove_widget_title($title){
		if (is_active_sidebar( 'header_left' ) || is_active_sidebar( 'headstrip' ) || is_active_sidebar( 'header_right' ) || is_active_sidebar( 'below_header' ) || is_active_sidebar( 'above_footer' ) ||is_active_sidebar( 'bottom_right' ) ||is_active_sidebar( 'above_woocommerce' )){
			return null;
		}
		return $title;
	}

function my_repair_categories_empty_title($title, $instance, $base) {
    if ( $base == 'categories' ) {
        if ( trim($instance['title']) == '' )
            return '';
    }
    return $title;
}
add_filter('widget_title', 'my_repair_categories_empty_title', 10, 3);

}
add_action( 'widgets_init', 'webseide_widgets_init' );

// Enqueue scripts and styles
function webseide_scripts() {
    $data = array(
        'header_height'     => ('' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height' ) : 80),
        'header_fixed'      => ('' != get_theme_mod( 'webseide_header_fixed' ) ? true : false),
        'headstrip_height'  => ('' != get_theme_mod( 'webseide_headstrip_height' ) ? get_theme_mod( 'webseide_headstrip_height' ) : 0),
        'headstrip_fixed'   => ('' != get_theme_mod( 'webseide_headstrip_fixed' ) ? true : false),
        'headstrip_position'=> ('' != get_theme_mod( 'webseide_headstrip_position' ) ? get_theme_mod( 'webseide_headstrip_position' ) : 'aboveheader')
    );

    echo '<script type="text/javascript">'."\n";
    echo '	var webseide_header = ' . json_encode($data) . ";\n";
    echo '</script>'."\n";

    // wp_enqueue_style( 'wp-customizer-css', get_template_directory_uri() . '/inc/customizer-css.php' );

	wp_enqueue_style( 'webseide-style', get_stylesheet_uri() );

	wp_enqueue_script( 'webseide-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'webseide-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script('jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'));

	wp_register_script( 'webseide-viewport', get_template_directory_uri() . '/js/jquery.viewportchecker.js', array(), '20120206', true );
	wp_enqueue_script('webseide-viewport');

	wp_enqueue_script('webseide', get_template_directory_uri() . '/js/webseide.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webseide_scripts' );

// Custom template tags for this theme
locate_template('/inc/template-tags.php', true, true);

// Customizer additions
locate_template('/inc/customizer.php', true, true);
locate_template('/inc/customizer-css.php', true, true);

// Jetpack compatibility file
locate_template('/inc/jetpack.php', true, true);

// webseide Customizer
add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );
function load_custom_plugin_translation_file( $mofile, $domain ) {
	if ( 'js_composer' === $domain ) {
		$mofile = get_template_directory() . '/languages/js_composer-' . get_locale() . '.mo';
	}

	if ( 'webseideframework_customizer' === $domain ) {
		$mofile = get_template_directory() . '/languages/webseideframework_customizer-' . get_locale() . '.mo';
	}

	return $mofile;
}

function wppf_add_link_metabox(){
    $screens = ['post'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wppf_link_metabox',
            'URL (Postformat "Link")',
            'external_link_form_field',
            $screen
        );
    }
}
add_action('add_meta_boxes', 'wppf_add_link_metabox');

function webseide_postformat_checker(){

}
add_action('init', 'webseide_postformat_checker');

#add_action('edit_form_after_title', 'external_link_form_field');
add_action('save_post', 'external_link_form_field_save');

add_action( 'init', 'webseide_add_editor_styles' );
// Apply theme's stylesheet to the visual editor.
function webseide_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}




function external_link_form_field( $post ) {
	if ( $post->post_type != 'post'){ return; }
  	$format = get_post_format($post->ID);

  	if($format != 'link' ){ return; }
  	?>
  		<div id="urlwrap">
  			<p>
			  	<label for="post-link-url"><strong>URL:</strong></label>
			  	<input type="text" class="large-text" name="_external_link_url" size="30" value="<?php echo get_post_meta($post->ID, 'external_link_url', true); ?>" id="post-link-url" autocomplete="off" />
			 </p>
		</div>
  <?php
}

function external_link_form_field_save( $postid ) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE );
	if ( isset($_POST['_external_link_url']) ) {
		if (( strpos($_POST['_external_link_url'], 'http://') !== 0 ) && (strpos($_POST['_external_link_url'], 'https://') !== 0 ))
	      	$_POST['_external_link_url'] = 'http://' . $_POST['_external_link_url'];
	    	$url = filter_var($_POST['_external_link_url'], FILTER_VALIDATE_URL) ? $_POST['_external_link_url'] : '';
	    	update_post_meta($postid, 'external_link_url', $url);
	}
}


// Customize embedded YouTube videos
function custom_youtube_settings($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
		return $return;
	}
	return $code;
}

add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');

// Theme slug removal
function themeslug_remove_hentry( $classes ) {
	if ( is_page() ) {
		$classes = array_diff( $classes, array( 'hentry' ) );
	}
	return $classes;
}
add_filter( 'post_class','themeslug_remove_hentry' );

// Add svg MIME type support
function svg_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'svg_mime_types' );

// Enqueue SVG javascript and stylesheet in admin
function svg_enqueue_scripts( $hook ) {
    wp_enqueue_style( 'fadupla-svg-style', get_theme_file_uri( '/inc/css/svg.css' ) );
    wp_enqueue_script( 'fadupla-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
    wp_localize_script( 'fadupla-svg-script', 'script_vars',
        array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'admin_enqueue_scripts', 'svg_enqueue_scripts' );


// Ajax get_attachment_url_media_library
function svg_get_attachment_url_media_library() {

    $url          = '';
    $attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
    if ( $attachmentID ) {
        $url = wp_get_attachment_url( $attachmentID );
    }

    echo $url;

    die();
}
add_action( 'wp_ajax_svg_get_attachment_url', 'svg_get_attachment_url_media_library' );

// Add categories to body tag
function pn_body_class_add_categories( $classes ) {
	if ( !is_single() )
		return $classes;
	$post_categories = get_the_category();
	foreach( $post_categories as $current_category ) {
		$classes[] = 'category-' . $current_category->slug;
	}
	return $classes;
}
add_filter( 'body_class', 'pn_body_class_add_categories' );

// Remove Noto Google Font
function my_remove_gutenberg_styles($translation, $text, $context, $domain) {
if($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
return $translation; }
return 'off';
}
add_filter( 'gettext_with_context', 'my_remove_gutenberg_styles',10, 4);

function guten_block_editor_assets() {
	wp_enqueue_style(
		'dl-editor-style',
		get_stylesheet_directory_uri() . "/inc/editor.css",
		array(),
		'1.0'
	);
}
add_action('enqueue_block_editor_assets', 'guten_block_editor_assets');

// Remove WPML CSS
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

// Remove query strings from static resources
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Remove emoji codes
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


// Remove canonical links
remove_action('wp_head', 'rel_canonical');

// Clean archive titles
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

// Remove loading gif for lazy load comments
add_filter( 'llc_enable_loader_element', '__return_false' );

// Remove IP addresses in comments
function  wpb_remove_commentsip( $comment_author_ip ) {
	return '';
	}
add_filter( 'pre_comment_user_ip', 'wpb_remove_commentsip' );

// Use HTML in category descriptions
remove_filter('pre_term_description', 'wp_filter_kses');

// Change excerpt length
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


// Color palette
 function webseide_setup_theme_supported_features() {

	add_theme_support( 'editor-color-palette',
		array(
            array(
	            'name' 	=> 'Header background',
	            'slug' 	=> 'color_one',
	            'color' => (get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background' ) : '#f4f3f2'),
	        ),
            array(
	            'name' 	=> 'Header font',
	            'slug' 	=> 'color_two',
	            'color' => (get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font' ) : '#000000'),
	        ),
            array(
	            'name' 	=> 'Header link hover',
	            'slug' 	=> 'color_three',
	            'color' => (get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover' ) : '#8e8e8e'),
	        ),
	        array(
	            'name' 	=> 'Content background',
	            'slug' 	=> 'color_four',
	            'color' => (get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background' ) : '#ffffff'),
	        ),
	        array(
	            'name' 	=> 'Content text',
	            'slug' 	=> 'color_five',
	            'color' => (get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text' ) : '#3a3a3a'),
	        ),
	        array(
	            'name' 	=> 'Content links & buttons background',
	            'slug' 	=> 'color_six',
	            'color' => (get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links' ) : '#ff6d63'),
	        ),
	        array(
	            'name' 	=> 'Mouse over color for links &amp; button backgrounds in content area',
	            'slug' 	=> 'color_seven',
	            'color' => (get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover' ) : '#e72655'),
	        ),
	        array(
	            'name' 	=> 'Mouse over color for font in buttons in content area',
	            'slug' 	=> 'color_eight',
	            'color' => (get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover' ) : '#ffffff'),
	        ),
	        array(
	            'name' 	=> 'Extra color',
	            'slug' 	=> 'color_nine',
	            'color' => (get_theme_mod( 'webseide_extra-color_1' ) ? get_theme_mod( 'webseide_extra-color_1' ) : '#448AFF'),
	        ),
	        array(
	            'name' 	=> 'Extra color 2',
	            'slug' 	=> 'color_ten',
	            'color' => (get_theme_mod( 'webseide_extra-color_2' ) ? get_theme_mod( 'webseide_extra-color_2' ) : '#FFD34E'),
	        )
		)
    );

}
add_action( 'after_setup_theme', 'webseide_setup_theme_supported_features' );

function blocks_css() {
    ?>
    <style type="text/css">
		.has-color-one-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background' ) : '#f4f3f2'); ?>;
		}
		.has-color-one-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background' ) : '#f4f3f2'); ?>;
		}

        .has-color-two-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font' ) : '#000000'); ?>;
		}
		.has-color-two-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font' ) : '#000000'); ?>;
		}

        .has-color-three-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover' ) : '#8e8e8e'); ?>;
		}
		.has-color-three-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover' ) : '#8e8e8e'); ?>;
		}

        .has-color-four-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background' ) : '#ffffff'); ?>;
		}
		.has-color-four-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background' ) : '#ffffff'); ?>;
		}

		.has-color-five-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text' ) : '#3a3a3a'); ?>;
		}
		.has-color-five-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text' ) : '#3a3a3a'); ?>;
		}

		.has-color-six-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1' ) : '#000000'); ?>;
		}
		.has-color-six-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1' ) : '#000000'); ?>;
		}

		.has-color-seven-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2' ) : '#3399CC'); ?>;
		}
		.has-color-seven-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2' ) : '#3399CC'); ?>;
		}

		.has-color-eight-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3' ) : '#66CCCC'); ?>;
		}
		.has-color-eight-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3' ) : '#66CCCC'); ?>;
		}

		.has-color-nine-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links' ) : '#ff6d63'); ?>;
		}
		.has-color-nine-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links' ) : '#ff6d63'); ?>;
		}

        .has-color-ten-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover' ) : '#e72655'); ?>;
		}
		.has-color-ten-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover' ) : '#e72655'); ?>;
		}

        .has-color-eleven-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover' ) : '#ffffff'); ?>;
		}
		.has-color-eleven-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover' ) : '#ffffff'); ?>;
		}

        .has-color-twelve-background-color {
		    background-color: <?php echo (get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background' ) : '#313131'); ?>;
		}
		.has-color-twelve-color {
		    color: <?php echo (get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background' ) : '#313131'); ?>;
		}

    </style>
    <?php
}

function webseide_block_editor_styles() {
    wp_enqueue_style( 'webseide-block-editor-styles', blocks_css() );
}

add_action( 'enqueue_block_editor_assets', 'webseide_block_editor_styles' );

// Declare WooCommerce Support
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 300,
		'single_image_width'    => 450,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Remove WooCommerce read more buttons
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Remove WooCommerce breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Remove WooCommerce results count
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

// Remove WooCommerce image links
add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails' );

function wc_remove_link_on_thumbnails( $html ) {
     return strip_tags( $html,'<div><img>' );
}

// Remove WooCommerce cart link in category view
add_action( 'woocommerce_after_shop_loop_item', 'remove_loop_button', 1 );
function remove_loop_button()
{
if( is_product_category() || is_shop()) {
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
}
}

// Override WooCommerce cart widget
add_action( 'widgets_init', 'override_widgets', 15 );

function override_widgets() {
    if ( class_exists( 'WC_Widget_Cart' ) ) {
    	unregister_widget( 'WC_Widget_Cart' );

		include_once( 'inc/widgets/webseide-class-wc-widget-cart.php' );
		register_widget( 'webseide_WC_Widget_Cart' );
	}
}

// Format Comments
function webseide_comments($comment, $args, $depth = 1) {
    if($comment->comment_approved == '0'){
        return '';
    }

    $args['max_depth']  = isset($args['max_depth']) ? $args['max_depth']: 2;
    $GLOBALS['comment'] = $comment;

    ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
     		<footer class="comment-meta">

			 	<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-content">
					<?php comment_text() ?>
				</div>

                <div class="comment-author vcard">
         			<?php printf(__('%s'), get_comment_author_link()) ?>
      			</div>

				<div class="comment-metadata">
                    <time>
                        <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
                    </time>
                    <?php edit_comment_link(__('(Edit)'),'  ','') ?>
				</div>
			</footer>
			<?php if((is_singular('post') && get_theme_mod('webseide_commentpostcolumns') <= 1) || (is_singular('page') && get_theme_mod('webseide_commentpagecolumns') <= 1)){ ?>
			<?php if(!has_block('delucks/comments-block')){  ?>
		    <div class="reply">
		    	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		    </div>
		    <?php } ?>
		    <?php } ?>
		</article>
     </li>
<?php
}



if($webseide_max_content_width = get_theme_mod('webseide_max-content_width')){
    apply_filters( 'kadence_blocks_default_small_editor_width', $webseide_max_content_width );
}

if($webseide_max_width = get_theme_mod('webseide_max_width')){
    apply_filters( 'kadence_blocks_default_large_editor_width', $webseide_max_width );
}


/* Customize Dashboard Widgets */
add_action('admin_init', 'dl_dashboard_remove_default_ones');

function dl_dashboard_remove_default_ones(){
	// Remove Right now
	/*remove_meta_box( 'network_dashboard_right_now', 'dashboard-network', 'core' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );*/
	// Remove WordPress Events and News
	remove_meta_box( 'dashboard_primary', 'dashboard-network', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

}

// Add Help Widget
function dl_dashboard_widget() {
	echo '<p>Durchsuche unsere Anleitungen oder frage unseren <a href="https://websei.de/support/" target="_blank">Premium-Support</a>.</p>
    <p><form  action="https://websei.de/" target="_blank">
<input type=text name=s value="" placeholder="Stichwortsuche, z.B. Bilder, CSS-Hacks" style="padding: 4px; min-width: 300px;">
<input type=submit value="Suchen" class="button button-primary">
</form></p>';
}
function dl_add_dashboard_widget() {
	wp_add_dashboard_widget('dl_dashboard_widget', 'Hilfe', 'dl_dashboard_widget');
}
add_action('wp_dashboard_setup', 'dl_add_dashboard_widget' );
add_action('wp_network_dashboard_setup','dl_add_dashboard_widget' );

/* Module Handling */
locate_template('/inc/modules.php', true, true);
$modules = new modules();

function webseideModules(){
    if(isset($GLOBALS['webseide_modules'])){
        return $GLOBALS['webseide_modules'];
    } else {
        locate_template('/inc/modules.php', true, true);
        $webseide_modules = new modules;
        $GLOBALS['webseide_modules'] = $webseide_modules;
        return $webseide_modules;
    }
}