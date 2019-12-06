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

