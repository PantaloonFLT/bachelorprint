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

add_action( 'wp_enqueue_scripts', 'delucks_get_scripts_styles');
function delucks_get_scripts_styles() {
    $result = [];
    $result['scripts'] = [];
    $result['styles'] = [];

    // Print all loaded Scripts
    global $wp_scripts;
    foreach( $wp_scripts->queue as $script ) :
    $result['scripts'][$wp_scripts->registered[$script]->handle] =  $wp_scripts->registered[$script]->src . ";";
    endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
    $result['styles'][$wp_styles->registered[$style]->handle] =  $wp_styles->registered[$style]->src . ";";
    endforeach;

    return $result;
}


#add_action( 'wp_head', 'delucks_print_scripts_styles');
function delucks_print_scripts_styles() {
    echo "<pre>";
    print_r(delucks_get_scripts_styles());
    echo "</pre>";
}



?>