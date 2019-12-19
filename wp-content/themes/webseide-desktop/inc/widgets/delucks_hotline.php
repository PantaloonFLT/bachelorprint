<?php

class delucks_hotline extends WP_Widget {
    function __construct() {
        parent::__construct('delucks_hotline', __('BP: Hotline', 'bachelorprint'), array( 'description' => __( 'Displays the hotline phone number', 'bachelorprint' )));
    }

    public function widget( $args, $instance ) {
        $phone = bp_get_phone();
        if($phone){
            echo '<div class="bp-cont-tel">';
            #if( !is_without_elem_shop( $site_uri, $links_without_shop ) ) {
                echo '<span class="lnr lnr-phone-handset"></span>';
                echo __( "Free advice", "bachelorprint" );
                echo '<a href="#">'. $phone .'</a>';
            #}
            echo '</div>';
        }
    }
}

function delucks_hotline_load_widget() {
    register_widget('delucks_hotline');
}
add_action( 'widgets_init', 'delucks_hotline_load_widget' );