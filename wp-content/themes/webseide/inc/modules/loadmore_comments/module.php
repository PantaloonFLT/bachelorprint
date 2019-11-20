<?php

// @TODO: count comments

if(!class_exists('loadmore_comments')){

    class loadmore_comments {

        var $status = true;
        var $proceed = false;

        function __construct(){
            add_action('wp_enqueue_scripts', array($this, 'enqeueScripts'));
            add_action('wp_ajax_loadmore_comments', array($this, 'ajaxLoadmoreComments'));
            add_action('wp_ajax_nopriv_loadmore_comments', array($this, 'ajaxLoadmoreComments'));

            if(ceil(wp_count_comments(get_the_ID())->approved / get_option('comments_per_page')) > 1){
                $this->proceed = true;
            }
        }

        function enqeueScripts(){
            wp_register_script('webseide-loadmore-comments', get_template_directory_uri() . '/inc/modules/loadmore_comments/js/module.js', array( 'jquery' ), null, true);
            wp_localize_script('webseide-loadmore-comments', 'loadmore_comments', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'comment_loading_text' => esc_html__( 'Loading...', 'webseide' ),
                'comment_more_text' => esc_html__( 'More comments', 'webseide' ),
                'parent_post_id' => get_the_ID(),
                'cpage' => 0,
                'comment_order' => get_option('comment_order'),
                'comments_per_page' => get_option('comments_per_page'),
                'default_comments_page' => get_option('default_comments_page'),
                'comment_count' => wp_count_comments(get_the_ID())->approved,
                'comment_max_page' => ceil(wp_count_comments(get_the_ID())->approved / get_option('comments_per_page'))
            ));
        }

        // New Comment view with correct order
        function showComments($args = array()){
            $args['status']     = 'approve';
            $args['order']      = get_option('comment_order');
            $args['per_page']   = isset($args['per_page']) ? $args['per_page'] : get_option('comments_per_page');
            $args['page']       = isset($args['page']) ? $args['page'] : 0;
            $args['post_id']    = isset($args['post_id']) ? $args['post_id'] : false;
            $post               = get_post($args['post_id']);

            global $post;
            setup_postdata($post);

            $comments = new WP_Comment_Query($args);

            if(!property_exists($comments, 'comments') || !count($comments->comments)){
                echo esc_html__( 'No comments', 'webseide' );
            }

            $comment_count  = count($comments->comments);
            $comments       = array_chunk($comments->comments, $args['per_page']);

            if(!isset($comments[$args['page']]) || !count($comments[$args['page']])){
                die();
            }

            foreach($comments[$args['page']] as $comment){
                webseide_comments($comment, array(), 1);
            }
        }

        function ajaxLoadmoreComments(){
            $this->showComments(array(
                'post_id' => $_POST['post_id'],
                'page'    => $_POST['cpage']
            ));
            die();
        }

        function customizer($wp_customize){ }

        function moreButton(){
            if($this->proceed){
                echo '<div class="webseide_comment_loadmore">'.esc_html__( 'More comments', 'webseide' ).'</div>';
                wp_enqueue_script('webseide-loadmore-comments');
            }
        }

    }

}