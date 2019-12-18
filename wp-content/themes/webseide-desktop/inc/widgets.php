<?php

/**
 * Widgets */
include 'widgets/delucks_languages.php';
include 'widgets/delucks_hotline.php';

/**
 * Sidebars */

/* footnotes */
/*
 function footnotes_init(){
 register_sidebar(array(
 'name'          => __( 'Fußzeile Weitere Hinweise', 'envor' ),
 'id'            => 'footer-before-bottom',
 'description'   => __( 'Footer Widget before Footer Content', 'envor' ),
 'before_widget' => '<div class="%1$s gtec-accordion"><div class="container">',
 'after_widget'  => '</div></div></div>',
 'before_title'  => '<p class="footnotes">',
 'after_title'   => ' <span class="lnr lnr-chevron-down"></span></p><div id="footnotes-content">',
 ));
 }
 add_action('widgets_init', 'footnotes_init');
 */

/* post sidebar */

function post_sidebar_init(){
    register_sidebar(array(
        'name'          => 'Post sidebar',
        'id'            => 'post_sidebar',
        'before_widget' => '<div class="post-sidebar_widget">',
        'after_widget'  => '</div>',
        'before_title' => '<h6 class="widget-title">',
		'after_title'  => '</h6>',
    ));
}
add_action( 'widgets_init', 'post_sidebar_init' );



/* sticky main navigation image */
function blog_sticky_nav_image_init(){
    register_sidebar(array(
        'name'          => 'Blog Sticky Nav Image',
        'id'            => 'blog_sticky_nav_image',
        'before_widget' => '',
        'after_widget'  => '',
    ));
}
add_action( 'widgets_init', 'blog_sticky_nav_image_init' );

/* sticky main navigation content */
function blog_sticky_nav_content_init(){
    register_sidebar(array(
        'name'          => 'Blog Sticky Nav Content',
        'id'            => 'blog_sticky_nav_content',
        'before_widget' => '',
        'after_widget'  => '',
    ));
}
add_action( 'widgets_init', 'blog_sticky_nav_content_init' );


/* OLD */

/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 26-02-16
 * Time: 17:52
 */

/**
 * Register Widget Area.
 *
 */


function sb_widgets_init()
{

    register_sidebar(
        array(
            'name' => 'Footer Language Switcher',
            'id' => 'footer-language-switcher',
            'before_widget' => '<div id="footer-language-widget">',
            'after_widget' => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Bottom',
            'id' => 'footer-bottom',
            'before_widget' => '<div id="footer-bottom-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar( array(
        'name'          => __( 'Footer One Bottom', 'envor' ),
        'id'            => 'footer-bottom-1',
        'description'   => __( 'Footer Widget that appears on the Footer Bottom.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Two Bottom', 'envor' ),
        'id'            => 'footer-bottom-2',
        'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Three Bottom', 'envor' ),
        'id'            => 'footer-bottom-3',
        'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer One Features', 'envor' ),
        'id'            => 'footer-features-1',
        'description'   => __( 'Footer Widget that appears on the Footer Features.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Two Features', 'envor' ),
        'id'            => 'footer-features-2',
        'description'   => __( 'Footer Widget that appears on the Footer Features.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Three Features', 'envor' ),
        'id'            => 'footer-features-3',
        'description'   => __( 'Footer Widget that appears on the Footer Features.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Four Features', 'envor' ),
        'id'            => 'footer-features-4',
        'description'   => __( 'Footer Widget that appears on the Footer Features.', 'envor' ),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ) );


	// language sidebars
	#global $wp_registered_sidebars;
	#$wp_registered_sidebars_snapshot = array_merge($wp_registered_sidebars);

	/*
	 * Set the sidebar id's to skip creation for all languages
	 * */

	/*
	$configSidebarsNoMultilanguage = array(
	    'post_sidebar',

	);


	$languages = apply_filters( 'wpml_active_languages', '' );
	foreach ($languages as $lang => $langConfig) {
		if ($lang != 'de') {
			foreach ($wp_registered_sidebars_snapshot as $sidebar) {
			    if(!in_array($sidebar['id'], $configSidebarsNoMultilanguage)){
				    $sidebar['id'] .= '_' . $lang;
				    $sidebar['name'] .= ' [' . strtoupper($lang) . ']';
				    register_sidebar($sidebar);
			    }
			}
		}
	}
	*/
}

function get_all_langs_names($lang='en'){
	global $wpdb;
	$lang_data = array();
	$languages = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT code, english_name, active, tag, name
            FROM {$wpdb->prefix}icl_languages lang
            INNER JOIN {$wpdb->prefix}icl_languages_translations trans
            ON lang.code = trans.language_code
            AND trans.display_language_code=%s"
			,
			$lang
		)
	);
	foreach($languages as $l){
		$lang_data[$l->code] = array(
			'english_name' => $l->english_name,
			'active' => $l->active,
			'tag' => $l->tag,
			'name' => $l->name,
		);
	}
	return $lang_data;
}

add_action('widgets_init', 'sb_widgets_init', 20);

/**
 * Adds Foo_Widget widget.
 */
class Feature_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'feature_widget', // Base ID
            __( 'Feature Widget', 'bachelorprint' ), // Name
            array( 'description' => __( 'Feature Footer', 'bachelorprint' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        if(isset($instance['icon'])){
            if($instance['icon'] == "review") {
                //http://localhost/1adruckwelt-wordpress/wordpress/wp-content/themes/clymene/images/blog-2.jpg
                $icon_url = get_stylesheet_directory_uri().'/images/ausgezeichnet.png';
                $args['before_widget'] = '<div class="col-sm-4 col-md-3"><img style="width:60px;" src="'.$icon_url.'" /></div>';
            } else {
                $icon = $instance['icon'];
                $args['before_widget'] = '<div class="col-sm-4 col-md-3 lnr-5 lnr lnr-' . $icon . '"></div>';
            }
        }
        else {
            $icon = 'license';
            $args['before_widget'] = '<div class="col-sm-4 col-md-3 lnr-5 lnr lnr-' . $icon . '"></div>';
        }

        $args['before_widget'] = $args['before_widget'];
        $args['after_widget'] = '';
        $args['text_area_before'] = '<div class="feature-description widget-text col-sm-8 col-md-9">';
        $args['text_area_after'] = '</div>';
        $args['before_title'] = '<h5>';
        $args['after_title'] = '</h5>';


        echo $args['before_widget'];
        if ( ! empty( $instance['title']) && ! empty( $instance['description'] )) {
            echo $args['text_area_before'];
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
            echo '<p>', $instance['description'], '<p>';
            echo $args['text_area_after'];
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'bachelorprint' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description', 'bachelorprint' );
        $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : __( 'Icon', 'bachelorprint' );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
        return $instance;
    }

} // class Foo_Widget

// register Foo_Widget widget
function register_feature_widget() {
    register_widget( 'Feature_Widget' );
}
add_action( 'widgets_init', 'register_feature_widget' );


class Recommendations_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'recommendations_widget', // Base ID
            __( 'Recommendation Widget', 'bachelorprint' ), // Name
            array( 'description' => __( 'Recommendation', 'bachelorprint' ), ) // Args
        );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_stylesheet_directory_uri() . '/js/upload_media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {


        $args['before_widget'] = '<div>';
        $args['after_widget'] = '</div>';
        $args['text_area_before'] = '<div class="product-recommendations col-md-12">';
        $args['text_area_after'] = '<a href="'.$instance['product_link'].'"><img src="'.$instance['product_image'].'" /></a><div class=""><div class="price pull-left">'.$instance['product_price'].'</div><div class="pull-right"><a class="link" href="'.$instance['product_link'].'">'.$instance['product_link_text'].'</a></div></div></div>';
        $args['before_title'] = '<h6 class="underline">';
        $args['after_title'] = '</h6>';


        echo $args['before_widget'];
        if ( ! empty( $instance['product_image']) && ! empty( $instance['description'] )) {
            if (!empty($instance['title'])) : echo $args['before_title'], $instance['title'], $args['after_title']; endif;
            echo $args['text_area_before'];
            echo '<p class="description">', $instance['description'], '<p>';
            echo $args['text_area_after'];
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : $title = '';
        $description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'Description', 'bachelorprint' );
        $product_image = ! empty( $instance['product_image'] ) ? $instance['product_image'] : __( 'Product Image', 'bachelorprint' );
        $product_price = ! empty( $instance['product_price'] ) ? $instance['product_price'] : __( 'Product Price', 'bachelorprint' );
        $product_link = ! empty( $instance['product_link'] ) ? $instance['product_link'] : __( 'Product Link', 'bachelorprint' );
        $product_link_text = ! empty( $instance['product_link_text'] ) ? $instance['product_link_text'] : __( 'Product Link Text', 'bachelorprint' );




        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'product_image' ); ?>"><?php _e( 'Custom Image :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'product_image' ); ?>" id="<?php echo $this->get_field_id( 'product_image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $product_image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_price' ); ?>"><?php _e( 'Product Price:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_price' ); ?>" name="<?php echo $this->get_field_name( 'product_price' ); ?>" type="text" value="<?php echo esc_attr( $product_price ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_link' ); ?>"><?php _e( 'Product Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_link' ); ?>" name="<?php echo $this->get_field_name( 'product_link' ); ?>" type="text" value="<?php echo esc_attr( $product_link ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_link_text' ); ?>"><?php _e( 'Product Link Text:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_link_text' ); ?>" name="<?php echo $this->get_field_name( 'product_link_text' ); ?>" type="text" value="<?php echo esc_attr( $product_link_text ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['product_image'] = ( ! empty( $new_instance['product_image'] ) ) ? strip_tags( $new_instance['product_image'] ) : '';
        $instance['product_price'] = ( ! empty( $new_instance['product_price'] ) ) ? strip_tags( $new_instance['product_price'] ) : '';
        $instance['product_link'] = ( ! empty( $new_instance['product_link'] ) ) ? strip_tags( $new_instance['product_link'] ) : '';
        $instance['product_link_text'] = ( ! empty( $new_instance['product_link_text'] ) ) ? strip_tags( $new_instance['product_link_text'] ) : '';


        return $instance;
    }

} // class Foo_Widget


class Method_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'method_widget', // Base ID
            __( 'Method Widget', 'bachelorprint' ), // Name
            array( 'description' => __( 'Can contain Payment Methods, or Delivery Methods', 'bachelorprint' ), ) // Args
        );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }

    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_stylesheet_directory_uri() . '/js/upload_media.js', array('jquery'));

        wp_enqueue_style('thickbox');
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {


        $args['before_widget'] = '';
        $args['after_widget'] = '';
        $args['text_area_before'] = '<div class="method col-md-2">';
        $args['text_area_after'] = '<img src="'.$instance['payment_image'].'" style="width:'.$instance['image_size'].'"/></div>';
        $args['before_title'] = '';
        $args['after_title'] = '';



        echo $args['before_widget'];
        if ( ! empty( $instance['payment_image'])) {
            if (!empty($instance['payment_title'])) : echo $args['before_title'], $instance['title'], $args['after_title']; endif;
            echo $args['text_area_before'];
            echo $args['text_area_after'];
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $payment_image = ! empty( $instance['payment_image'] ) ? $instance['payment_image'] : __( 'http://', 'bachelorprint' );
        $payment_link = ! empty( $instance['payment_link'] ) ? $instance['payment_link'] : __( 'URL', 'bachelorprint' );
        $image_size = ! empty( $instance['image_size'] ) ? $instance['image_size'] : __( '50px;', 'bachelorprint' );

        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'payment_image' ); ?>"><?php _e( 'Custom Image :' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'payment_image' ); ?>" id="<?php echo $this->get_field_id( 'payment_image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $payment_image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image_size' ); ?>"><?php _e( 'Custom Size :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" type="text" value="<?php echo esc_attr( $image_size ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'payment_link' ); ?>"><?php _e( 'Payment Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'payment_link' ); ?>" name="<?php echo $this->get_field_name( 'payment_link' ); ?>" type="text" value="<?php echo esc_attr( $payment_link ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['payment_image'] = ( ! empty( $new_instance['payment_image'] ) ) ? strip_tags( $new_instance['payment_image'] ) : '';
        $instance['payment_link'] = ( ! empty( $new_instance['payment_link'] ) ) ? strip_tags( $new_instance['payment_link'] ) : '';
        $instance['image_size'] = ( ! empty( $new_instance['image_size'] ) ) ? strip_tags( $new_instance['image_size'] ) : '';


        return $instance;
    }

} // class Foo_Widget

function register_method_widget() {
    register_widget( 'Method_Widget' );
}
add_action( 'widgets_init', 'register_method_widget' );

class Title_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'title_widget', // Base ID
            __( 'Title Widget', 'bachelorprint' ), // Name
            array( 'description' => __( 'Title', 'bachelorprint' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {


        $args['before_widget'] = '<h6>'. $instance['title'].'</h6>';
        $args['after_widget'] = '';
        $args['text_area_before'] = '';
        $args['text_area_after'] = '';
        $args['before_title'] = '';
        $args['after_title'] = '';



        echo $args['before_widget'];
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Title', 'bachelorprint' );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';


        return $instance;
    }

} // class Foo_Widget

function register_title_widget() {
    register_widget( 'Title_Widget' );
}
add_action( 'widgets_init', 'register_title_widget' );

// register Foo_Widget widget
function register_recommendations_widget() {
    register_widget( 'Recommendations_Widget' );
}
add_action( 'widgets_init', 'register_recommendations_widget' );

/**
 * Registers settings section and fields
 */
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the main plugin file.
 *
 * @author Tareq Hasan <tareq@weDevs.com>
 */


/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the main plugin file.
 *
 * @author Tareq Hasan <tareq@weDevs.com>
 */


/**
 * Registers settings section and fields
 */
//if ( !function_exists( 'wedevs_admin_init' ) ):
//    function wedevs_admin_init() {
//
//        $sections = array(
//            array(
//                'id' => 'wedevs_basics',
//                'title' => __( 'Basic Settings', 'wedevs' )
//            ),
//            array(
//                'id' => 'wedevs_advanced',
//                'title' => __( 'Advanced Settings', 'wedevs' )
//            ),
//            array(
//                'id' => 'wedevs_others',
//                'title' => __( 'Other Settings', 'wpuf' )
//            )
//        );
//
//        $fields = array(
//            'wedevs_basics' => array(
//                array(
//                    'name' => 'text',
//                    'label' => __( 'Text Input', 'wedevs' ),
//                    'desc' => __( 'Text input description', 'wedevs' ),
//                    'type' => 'text',
//                    'default' => 'Title'
//                ),
//                array(
//                    'name' => 'textarea',
//                    'label' => __( 'Textarea Input', 'wedevs' ),
//                    'desc' => __( 'Textarea description', 'wedevs' ),
//                    'type' => 'textarea'
//                ),
//                array(
//                    'name' => 'checkbox',
//                    'label' => __( 'Checkbox', 'wedevs' ),
//                    'desc' => __( 'Checkbox Label', 'wedevs' ),
//                    'type' => 'checkbox'
//                ),
//                array(
//                    'name' => 'radio',
//                    'label' => __( 'Radio Button', 'wedevs' ),
//                    'desc' => __( 'A radio button', 'wedevs' ),
//                    'type' => 'radio',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'multicheck',
//                    'label' => __( 'Multile checkbox', 'wedevs' ),
//                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
//                    'type' => 'multicheck',
//                    'options' => array(
//                        'one' => 'One',
//                        'two' => 'Two',
//                        'three' => 'Three',
//                        'four' => 'Four'
//                    )
//                ),
//                array(
//                    'name' => 'selectbox',
//                    'label' => __( 'A Dropdown', 'wedevs' ),
//                    'desc' => __( 'Dropdown description', 'wedevs' ),
//                    'type' => 'select',
//                    'default' => 'no',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'password',
//                    'label' => __( 'Password', 'wedevs' ),
//                    'desc' => __( 'Password description', 'wedevs' ),
//                    'type' => 'password',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'file',
//                    'label' => __( 'File', 'wedevs' ),
//                    'desc' => __( 'File description', 'wedevs' ),
//                    'type' => 'file',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'color',
//                    'label' => __( 'Color', 'wedevs' ),
//                    'desc' => __( 'Color description', 'wedevs' ),
//                    'type' => 'color',
//                    'default' => ''
//                )
//            ),
//            'wedevs_advanced' => array(
//                array(
//                    'name' => 'text',
//                    'label' => __( 'Text Input', 'wedevs' ),
//                    'desc' => __( 'Text input description', 'wedevs' ),
//                    'type' => 'text',
//                    'default' => 'Title'
//                ),
//                array(
//                    'name' => 'textarea',
//                    'label' => __( 'Textarea Input', 'wedevs' ),
//                    'desc' => __( 'Textarea description', 'wedevs' ),
//                    'type' => 'textarea'
//                ),
//                array(
//                    'name' => 'checkbox',
//                    'label' => __( 'Checkbox', 'wedevs' ),
//                    'desc' => __( 'Checkbox Label', 'wedevs' ),
//                    'type' => 'checkbox'
//                ),
//                array(
//                    'name' => 'radio',
//                    'label' => __( 'Radio Button', 'wedevs' ),
//                    'desc' => __( 'A radio button', 'wedevs' ),
//                    'type' => 'radio',
//                    'default' => 'no',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'multicheck',
//                    'label' => __( 'Multile checkbox', 'wedevs' ),
//                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
//                    'type' => 'multicheck',
//                    'default' => array( 'one' => 'one', 'four' => 'four' ),
//                    'options' => array(
//                        'one' => 'One',
//                        'two' => 'Two',
//                        'three' => 'Three',
//                        'four' => 'Four'
//                    )
//                ),
//                array(
//                    'name' => 'selectbox',
//                    'label' => __( 'A Dropdown', 'wedevs' ),
//                    'desc' => __( 'Dropdown description', 'wedevs' ),
//                    'type' => 'select',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'password',
//                    'label' => __( 'Password', 'wedevs' ),
//                    'desc' => __( 'Password description', 'wedevs' ),
//                    'type' => 'password',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'file',
//                    'label' => __( 'File', 'wedevs' ),
//                    'desc' => __( 'File description', 'wedevs' ),
//                    'type' => 'file',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'color',
//                    'label' => __( 'Color', 'wedevs' ),
//                    'desc' => __( 'Color description', 'wedevs' ),
//                    'type' => 'color',
//                    'default' => ''
//                )
//            ),
//            'wedevs_others' => array(
//                array(
//                    'name' => 'text',
//                    'label' => __( 'Text Input', 'wedevs' ),
//                    'desc' => __( 'Text input description', 'wedevs' ),
//                    'type' => 'text',
//                    'default' => 'Title'
//                ),
//                array(
//                    'name' => 'textarea',
//                    'label' => __( 'Textarea Input', 'wedevs' ),
//                    'desc' => __( 'Textarea description', 'wedevs' ),
//                    'type' => 'textarea'
//                ),
//                array(
//                    'name' => 'checkbox',
//                    'label' => __( 'Checkbox', 'wedevs' ),
//                    'desc' => __( 'Checkbox Label', 'wedevs' ),
//                    'type' => 'checkbox'
//                ),
//                array(
//                    'name' => 'radio',
//                    'label' => __( 'Radio Button', 'wedevs' ),
//                    'desc' => __( 'A radio button', 'wedevs' ),
//                    'type' => 'radio',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'multicheck',
//                    'label' => __( 'Multile checkbox', 'wedevs' ),
//                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
//                    'type' => 'multicheck',
//                    'options' => array(
//                        'one' => 'One',
//                        'two' => 'Two',
//                        'three' => 'Three',
//                        'four' => 'Four'
//                    )
//                ),
//                array(
//                    'name' => 'selectbox',
//                    'label' => __( 'A Dropdown', 'wedevs' ),
//                    'desc' => __( 'Dropdown description', 'wedevs' ),
//                    'type' => 'select',
//                    'options' => array(
//                        'yes' => 'Yes',
//                        'no' => 'No'
//                    )
//                ),
//                array(
//                    'name' => 'password',
//                    'label' => __( 'Password', 'wedevs' ),
//                    'desc' => __( 'Password description', 'wedevs' ),
//                    'type' => 'password',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'file',
//                    'label' => __( 'File', 'wedevs' ),
//                    'desc' => __( 'File description', 'wedevs' ),
//                    'type' => 'file',
//                    'default' => ''
//                ),
//                array(
//                    'name' => 'color',
//                    'label' => __( 'Color', 'wedevs' ),
//                    'desc' => __( 'Color description', 'wedevs' ),
//                    'type' => 'color',
//                    'default' => ''
//                )
//            )
//        );
//        //require ABSPATH . '/vendor/autoload.php';
//
//        $settings_api = WeDevs_Settings_API::getInstance();
//
//        //set sections and fields
//        $settings_api->set_sections( $sections );
//        $settings_api->set_fields( $fields );
//
//        //initialize them
//        $settings_api->admin_init();
//    }
//endif;
//add_action( 'admin_init', 'wedevs_admin_init' );
//
//if ( !function_exists( 'wedevs_admin_menu' ) ):
//    /**
//     * Register the plugin page
//     */
//    function wedevs_admin_menu() {
//        add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', 'wedevs_plugin_page' );
//    }
//endif;
//add_action( 'admin_menu', 'wedevs_admin_menu' );
//
///**
// * Display the plugin settings options page
// */
//if ( !function_exists( 'wedevs_plugin_page' ) ):
//    function wedevs_plugin_page() {
//
//
//        $settings_api = new WeDevs_Settings_API;
//
//        echo '<div class="wrap">';
//        settings_errors();
//
//        $settings_api->show_navigation();
//        $settings_api->show_forms();
//
//        echo '</div>';
//    }
//endif;
?>
<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WebW_Recent_Posts_Current_Cat extends WP_Widget {

    /**
     * Sets up a new Recent Posts widget instance.
     *
     * @since 2.8.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Your site&#8217;s most recent Posts.") );
        parent::__construct('recent-posts', __('Recent Posts'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';
    }

    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filter the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */

        $curr_cat = get_the_category();
        $cat_name = $curr_cat[0]->name;
        $cat_id = $curr_cat[0]->cat_ID;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'cat'                 => $cat_id,
        ) ) );

        if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
            //echo $args['before_title'] . $title . $args['after_title'];

            }
            echo '<h6>' . __('Alles zum Thema', 'bachelorprint') . ' ' . $cat_name . '</h6>';
            ?>

            <ul>
                <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                        <?php if ( $show_date ) : ?>
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

        endif;
    }

    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
        <?php
    }
}
function WebW_register_custom_widgets() {
    register_widget( 'WebW_Recent_Posts_Current_Cat' );
}
add_action( 'widgets_init', 'WebW_register_custom_widgets' );
