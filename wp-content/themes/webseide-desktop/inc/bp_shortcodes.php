<?php

add_shortcode('home_area', 'bp_homepage_fields');
function bp_homepage_fields($atts)
{
    $atts = shortcode_atts(
        array(
            'title' => 'Titel',
            'content' => 'Sta dido de more fi mosa mutro la vita de la a filo fortade.se mio di nosta.',
            'url' => '',
        ), $atts, 'home_area');


    $data = '<div class="textbox-homepage"><h2 style="text-align: left;"><a href="' . $atts['url'] . '">' . $atts['title'] . '</a></h2>
                <p class="homepage-box-paragraphs" style="text-align: left;">' . $atts['content'] . '</p>
                <p class="homepage-boxes-hyperlink"><em><a href="' . $atts['url'] . '">&gt;&gt; ' . __('Mehr', 'bachelorprint') . '</a></em></p>
            </div>';
    return $data;
}


add_shortcode('bp_button', 'bp_button');
function bp_button($atts)
{
    $atts = shortcode_atts(
        array(
            'title' => 'Titel',
            'class' => 'home-button',
            'color' => 'blue',
            'size' => 'btn-sm',
            'position' => 'pull-right',
            'url' => '',
        ), $atts, 'home_area');

    $data = '<a class="' . $atts['position'] . ' ' . $atts['size'] . ' ' . $atts['class'] . ' ' . $atts['color'] . ' " href="' . $atts['url'] . '">' . $atts['title'] . '</a>';

    return $data;
}


// Testimonial Slider
add_shortcode('bp_review', 'bp_review');
function bp_review($atts, $content = null)
{
    $show = 3;
    extract(shortcode_atts(array(
        'show' => '',
    ), $atts));

    ob_start(); ?>

    <div class="container">

        <?php
        $args = array(
            'paged' => 0,
            'post_type' => 'testimonial',
            'posts_per_page' => 3,
        );
        $count = 0;
        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()): $wp_query->the_post();
            $count++;
            $job = get_post_meta(get_the_ID(), '_cmb_job_testi', true);
            $rating = get_post_meta(get_the_ID(), '_rating', true);

            $total = 5;
            $star_string = '-1n+' . $rating . '';

            $rating_icons = '';
            ?>
            <div id="customer-review-<?= $count ?>" class="col-md-4 review-customer">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="arrow-right"></div>
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                <?php } ?>
                <h6><?php the_title(); ?></h6>
                <div class="company-name"><?php echo htmlspecialchars_decode($job); ?></div>
                <div class="ratings-testimonial-<?php echo $count; ?>">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <?php the_content(); ?>
            </div>
            <style>
                .ratings-testimonial-<?php echo $count; ?> > .fa-star:nth-child(<?php echo $star_string; ?>) {
                    color: rgba(255, 227, 120, 0.91);
                }
            </style>
        <?php endwhile; ?>
    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            "use strict";
            var owl = jQuery(".carousel-team-col<?php echo esc_attr(3); ?>");

            owl.owlCarousel({

                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [767, 1],
                    [768, <?php echo esc_js($show) - 1; ?>],
                    [1000, <?php echo esc_js($show); ?>],
                    [1200, <?php echo esc_js($show); ?>],
                    [1400, <?php echo esc_js($show); ?>],
                    [1600, <?php echo esc_js($show); ?>]
                ],
                navigation: false,
                pagination: true,
                autoPlay: 5000

            });
        });
    </script>
    <?php

    return ob_get_clean();
}

##### FUNCTION TO LOAD POSTS ANYWHERE ######
add_shortcode('show_posts', 'bp_display_posts');
function bp_display_posts()
{ ?>
    <div class="container home-blog">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()): $wp_query->the_post();
            ?>
				<?php echo '<div class="col-sm-3 col-md-3 homepage-thumbnail homepage-thumbnail-mobile" style="margin-right:0px;">'; ?>
				<?php get_template_part('content', (post_type_supports(get_post_type(), 'post-formats') ? get_post_format() : get_post_type())); ?>
				<?php echo '</div>'; ?>
        <?php endwhile; ?>
<!--        --><?php //echo do_shortcode( "[yuzo_related]" ); ?>
        <a class="pull-right" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Zum Wissenmagazin', 'bachelorprint'); ?>
            <i class="fa fa-angle-double-right" style="margin-left:5px;"></i>
        </a>
    </div>
<?php }

add_shortcode('show_content_boxes', 'bp_get_content_boxes');
function bp_get_content_boxes($atts)
{
    $atts = shortcode_atts(
        array(
            'page' => 'home'
        ), $atts);

    $content_args = array(
        'post_type' => array('content_box'),
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'custom_box_page',
                'field' => 'slug',
                'terms' => array($atts['page']),
            ))
    );
    //print_r(ICL_LANGUAGE_CODE);
    //$my_current_lang = apply_filters( 'wpml_current_language', NULL );
    //print_r($my_current_lang);
    //print_r($bp_lang_code);
    //$lang='pl';
    //print_r();
    
    /*global $sitepress;
    $site_url = $_SERVER['HTTP_HOST'];
    $bp_domain = substr( $site_url, 1+strrpos( $site_url, "." ) );
    switch( $bp_domain ) {
        case 'pl':  $sitepress->switch_lang( 'pl' ); break;
        case 'com': $sitepress->switch_lang( 'en' ); break;
        case 'de':  $sitepress->switch_lang( 'de' ); break;
        case 'at':  $sitepress->switch_lang( 'at' ); break;
        case 'ch':  $sitepress->switch_lang( 'ch' ); break;
        case 'tr':  $sitepress->switch_lang( 'tr' ); break;
        case 'nl':  $sitepress->switch_lang( 'nl' ); break;
        case 'fr':  $sitepress->switch_lang( 'fr' ); break;
        case 'it':  $sitepress->switch_lang( 'it' ); break;
        case 'es':  $sitepress->switch_lang( 'es' ); break;
        default:    $sitepress->switch_lang( 'de' );
    }*/
   /* if(is_locale_switched()){
        //echo 'd';
    }
    //print_r(get_locale());
    print_r();*/
// The Query
    $content_query = new WP_Query($content_args);
    $count = $content_query->found_posts;

    if ($count < 4) {
        $class = 'col-md-4';
    } elseif ($count > 3) {
        $class = 'col-md-3';
    }
//print_r($content_query);
// The Loop
    $count = 0;
    while ($content_query->have_posts()):
        $count++;
        $content_query->the_post();
        $option = get_post_meta(get_the_ID(), '_cmb_content_box_url_option', true);
        if ($option == "1") :
            $page_url = get_post_meta(get_the_ID(), '_cmb_content_box_url', true);
        else :
            $page_id = get_post_meta(get_the_ID(), '_cmb_link_to_page', true);
            $page_url = get_page_link($page_id);
        endif;
        ?>
        <div class="textbox-homepage content-box-<?php the_ID(); ?> <?php echo $class; ?>"
             style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');">

            <div class="overlay">
                <h2 style="text-align: left;"><?php the_title(); ?></h2>
                <div class="homepage-box-paragraphs">
                    <?php the_content(); ?>
                </div>
                <p class="homepage-boxes-hyperlink">
                    <em>
                        <a href="<?php echo $page_url; ?>">&gt;&gt; <?php _e('Mehr', 'bachelorprint'); ?></a>
                    </em>
                </p>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    "use strict";
                    jQuery('.content-box-<?php the_ID(); ?>').click(function () {
                        window.location.href = '<?= $page_url; ?>';
                        // console.log('<?php echo $page_url; ?>');
                        // link inside #main_menu or #second_menu
                    });
                });
            </script>
        </div>
    <?php endwhile;
}


add_shortcode('header_separator', 'bp_get_separator_style');
function bp_get_separator_style($atts) {
    $atts = shortcode_atts(
        array(
            'title' => 'Header'
        ), $atts);

    return '<h2 class="fancy"><span>' . $atts['title'] . '</span></h2>';
}


/*
* Callback function to filter the MCE settings
*/
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
function wpb_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}


// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
/**
 * @param $init_array
 * @return mixed
 */
function my_mce_before_init_insert_formats($init_array)
{
// Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Grauen BG',
            'block' => 'div',
            'classes' => 'grey-block',
            'wrapper' => true,

        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
}


// Function for BachelorPrint custom bulleted blog box
add_shortcode('bp_numbered_list', 'bp_custom_blog_box');
function bp_custom_blog_box($atts, $content = null) {
    return '<div class="bp-custom-ordered-list col-sm-12 col-md-12">' . $content . '</div>';
}


/**
 * Shortcode to add Elements to the Scroll-To Indexing
 * Hint: shortcode is used like [anchor class ="my_class"]My Content[/anchor]
 * per default the CSS class is set to content_anchor, which gets searched and indexed by jQuery
 *
 * @param $atts
 * @param null $content
 * @return string
 */
function content_anchor( $atts, $content = null ) {
    $atts = shortcode_atts(
        array(
            'class' => 'content_anchor'
        ), $atts);
    return '<span class="' . esc_attr( $atts['class'] ) . '">' . $content . '</span>';
}
add_shortcode( 'anchor', 'content_anchor' );


/**
 * Shortcode to add a footnote-Element which will be fetched and shown in the "Quellenverzeichnis"
 * Usage: [ref ref_anchor="myfootnote2016" ref_text="<strong>My Footnote, 2016</strong> further description of the footnote"](My Footnote 2016:123)[/ref]
 * Hint: if multiple footnotes reference to the same source, the ref_anchor has to be equal
 *       and the ref_text only has to be given to the first appear of the source
 *
 * @param $atts
 * @param $content
 * @return string
 */
function footnotes_reference($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'ref_name' => '',
            'ref_text' => ''
    ), $atts);
    return '<a class="ref_anchor" id="' . esc_attr($atts['ref_name']) . '" data-description="'. $atts['ref_text'] .'">' . $content . '</a>';
}
add_shortcode('ref', 'footnotes_reference');