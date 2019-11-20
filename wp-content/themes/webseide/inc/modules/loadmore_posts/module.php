<?php

if(!class_exists('loadmore_posts')){

    class loadmore_posts {

        var $status = true;

        function __construct(){
            global $wp_query;
            wp_register_script('webseide-loadmore-posts', get_template_directory_uri() . '/inc/modules/loadmore_posts/js/module.js', array('jquery'));
            wp_localize_script('webseide-loadmore-posts', 'loadmore_posts', array(
                'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
                'posts' => json_encode( $wp_query->query_vars ),
                'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
                'max_page' => $wp_query->max_num_pages,
                'loading_text' => __('Loading...', 'webseide'),
                'loadmore_text' => __('More posts', 'webseide')
            ));

            add_action('wp_ajax_loadmore_posts', array($this, 'ajaxLoadmorePosts'));
            add_action('wp_ajax_nopriv_loadmore_posts', array($this, 'ajaxLoadmorePosts'));
        }

        function ajaxLoadmorePosts(){
            $args = json_decode( stripslashes( $_POST['query'] ), true );
            $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
            $args['post_status'] = 'publish';

            query_posts( $args );

            if( have_posts() ) :
                while( have_posts() ): the_post();
                    get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
            endif;

            die;
        }

        function moreButton(){
            global $wp_query;
            if($wp_query->max_num_pages > 1){
                echo '<div class="webseide_loadmore_posts">'.__('More posts', 'webseide').'</div>';
                wp_enqueue_script('webseide-loadmore-posts');
            }
        }

    }

}