<?php

function delucks_find_shortcode_posts($shortcode=''){
    global $wpdb;
    return $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE post_content LIKE '%[".$shortcode."%'", ARRAY_N);
}

function delucks_find_template_posts($template){
     $args = array(
         'post_type' => array('page', 'post'),
         'posts_per_page' => -1,
         'meta_query' => array(
             array(
                'key' => '_wp_page_template',
                'value' => $template
             )
         )
     );
     return new WP_Query( $args );
}


?>