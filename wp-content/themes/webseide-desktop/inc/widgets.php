<?php

function gtec_widgets_init(){
    register_sidebar(array(
        'name'          => __( 'Fußzeile Weitere Hinweise', 'envor' ),
        'id'            => 'footer-before-bottom',
        'description'   => __( 'Footer Widget before Footer Content', 'envor' ),
        'before_widget' => '<div class="%1$s gtec-accordion"><div class="container">',
        'after_widget'  => '</div></div></div>',
        'before_title'  => '<p class="bold collapsed" data-toggle="collapse" data-target="#gtec-accordion-content">',
        'after_title'   => ' <i class="fa fa-angle-down" aria-hidden="true"></i></p><div class="clear"></div><div id="gtec-accordion-content" class="col-md-6 collapse">',
    ));
}

add_action('widgets_init', 'gtec_widgets_init');

include 'widgets/delucks_languages.php';
include 'widgets/delucks_hotline.php';
