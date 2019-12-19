<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 12.01.17
 * Time: 16:51
 */

class GtecTopPopup
{

    function __construct() {
        add_action('init', array($this, 'registerPopupTop'));
        add_action('after_body_tag', array($this, 'createPopupTop'));
        add_filter('addTags', [$this, 'addTagsFilter'], 10, 2);
    }

    function registerPopupTop() {
        //build in suitable labels, according to :
        // https://codex.wordpress.org/Function_Reference/register_post_type

        register_post_type('gtec_popup_top',
            array(
                'label' => 'Popup Top',
                'description' => 'Custom field for injecting messages at the very top of the website',
                'public' => true,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'has_archive' => false,
                'rewrite' => false,
                'query_var' => false,
                'supports' => array('title', 'editor')
            )
        );
    }

    /**
     * @param string $content
     * @param int $postId
     * @return string
     */
    function addTagsFilter($content, $postId) {
        $popup = '<div class="popup-top" data-popup="banner-'.$postId.'">';
        $popup .= $content;
        $popup .= '<span data-toggle-popup class="close-popup-button"></span>';
        $popup .= "</div>";

        return $popup;
    }

    function createPopupTop() {
        $args = array( 'post_type' => 'gtec_popup_top');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            echo apply_filters('addTags', get_the_content(), get_the_ID());
        endwhile;
		wp_reset_postdata();
    }
}

$GtecTopPopup = new GtecTopPopup();