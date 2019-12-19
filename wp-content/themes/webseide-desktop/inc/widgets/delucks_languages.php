<?php

class delucks_languages extends WP_Widget {
    function __construct() {
        parent::__construct('delucks_languages', __('BP: Languages', 'bachelorprint'), array( 'description' => __( 'Displays the language flags', 'bachelorprint' )));
    }

    public function widget( $args, $instance ) {
	    echo '<span class="gtec-language-switch-wrapper bp-custom-lang">';
        echo bp_get_lang();
        echo '</span>';
    }
}

function delucks_languages_load_widget() {
    register_widget('delucks_languages');
}
add_action( 'widgets_init', 'delucks_languages_load_widget' );