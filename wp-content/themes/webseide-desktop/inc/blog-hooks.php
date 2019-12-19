<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 26-02-16
 * Time: 17:55
 */

function bp_pagination_blog(){
    global $wp_query;
    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'next_text' => __('Umblättern <span class="lnr lnr-chevron-right" style="font-size:14px;margin-left:25px;"></span>'),
        'prev_text' => __('<span class="lnr lnr-chevron-left" style="font-size:14px;margin-right:25px;"></span> Zurück')
    ));
    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div class="pagination-wrap"><ul class="pagination">';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></div>';
    }
}


function pb_custom_pagination(){
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('Zurück'),
        'next_text' => __('Umblättern'),
        'type' => 'plain',
        'add_args' => false,
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    ));

    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<ul class="pagination">';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul>';
    }
}

// Not a shortcode (bad idea)
function bp_add_themes_list(){
    global $post;
    $themes = get_post_meta($post->ID, '_cmb_themes_list', false);
    ?>
    <div class="themes-list">
        <?php if (isset($themes)): ?>
            <h5><?php _e('Themen in Überblick', 'bachelorprint'); ?></h5>
            <ul>
                <?php foreach ($themes as $page_id): ?>
                    <li>
                        <a href="<?php echo get_permalink($page_id) ?>"><?php echo get_the_title($page_id); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php }


// Load the name tags
function bp_get_post_themes(){
    global $post;
    $anchors = get_post_meta($post->ID, '_cmb_themes_list_jump', false); ?>
    <div class="themes-list">
        <?php if (isset($anchors)): ?>
            <h5><?php _e('Themen in Überblick', 'bachelorprint'); ?></h5>
            <ul>
                <?php foreach ($anchors as $anchor): ?>
                    <?php foreach ($anchor as $key => $value): ?>
                        <li><a href="<?php echo $value[0]; ?>"><?php echo $value[1] ?></a></li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>


<?php }


function bp_get_shares_button(){
    ?>
    <div class="addthis_sharing_toolbox"></div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5252eec27ca6d66a"></script>
<?php }


function bp_get_the_author(){ ?>

    <?php $id = get_the_author_meta('id'); ?>
       <div class="post-author">
        <div class="author-block col-md-12">
            <div class="profile-image col-md-3">
                <a href="<?= get_the_author_meta('url'); ?>" target="_blank" rel="nofollow">
                    <?php echo get_avatar(get_the_author_meta('email'), 100); ?>
                </a>
            </div>
            <div class="profile-description col-md-9">
                <span><?php if($id == 7){ _e('Über die Autorin', 'bachelorprint'); }else{ _e('Über den Autor', 'bachelorprint'); }?></span>
                <h3><?php the_author_link(); ?></h3>
                <p><?php echo gtec_get_the_author_meta('description'); ?></p>
            </div>
        </div>


    </div>

<?php }

function bp_get_post_nav(){ ?>
    <div class="navigation-post">
        <div class="prev page-numbers pull-left"><span class="lnr lnr-chevron-left" style="font-size:12px;margin-right:25px;"></span><?php previous_post_link('%link', 'Zum vorherigen Artikel', TRUE, '13'); ?></div>
        <?php if ($link = get_next_post_link('%link', 'Zum nächsten Artikel', true, '13')) : ?>
            <div class="next page-numbers pull-right"><?= $link ?>
                <span class="lnr lnr-chevron-right" style="font-size:12px;margin-left:25px;"></span>
            </div>
        <?php endif; ?>
    </div>
<?php }

function bp_run_slider(){ ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $argsSlides = array(
                'post_type' => 'slides',
                'post_status' => 'publish',
            );
            $wp_query_slides = new WP_Query($argsSlides);
            ?>

            <?php

            $count = 0;
            while ($wp_query_slides->have_posts()): $wp_query_slides->the_post();

                $slides_top_small_header = get_post_meta(get_the_ID(), '_cmb_slides_top_small_header', true);
                $slides_top_header = get_post_meta(get_the_ID(), '_cmb_slides_top_header', true);
                $slides_description = get_post_meta(get_the_ID(), '_cmb_slides_description', true);
                $slides_button_title = get_post_meta(get_the_ID(), '_cmb_slides_button_title', true);
                $slides_button_link = get_post_meta(get_the_ID(), '_cmb_slides_button_link', true);
                $slides_text_color = get_post_meta(get_the_ID(), '_cmb_slides_text_color', true);

                if(!empty($slides_text_color)) :
                    $slides_text_color = $slides_text_color;
                    else :
                        $slides_text_color = '';
                endif;

                ?>
                <div id="" class="bp-homepage-slider item <?php echo $count ?> <?php if ($count == 0) {
                    echo 'active';
                } ?>">
                    <a href="<?= $slides_button_link ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
                    <div class="carousel-caption home-caption slider-text-<?php echo $count; ?>" style="<?= 'color:', $slides_text_color; ?>">
                        <h4 style="<?= 'color:', $slides_text_color ?>"><?php echo $slides_top_small_header; ?></h4>
                        <h2 style="<?= 'color:', $slides_text_color ?>"><?php echo $slides_top_header; ?></h2>
                        <h3 style="<?= 'color:', $slides_text_color ?>"><?php echo $slides_description; ?></h3>
                        <a class="btn-lg shop-button blue"
                           href="<?php echo $slides_button_link; ?>"><span><?php echo $slides_button_title; ?></span></a>
                    </div>
                    </a>
                </div><!-- End Item -->
                <?php
                $count++;
            endwhile;

            ?>
            <a class="carousel-control left bp-homepage-slider-icons" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right bp-homepage-slider-icons" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div><!-- End Carousel Inner -->

        <?php
        $wp_query_slides_pagination = new WP_Query($argsSlides);
        ?>
        <ul class="nav nav-pills nav-justified bp-homepage-pills">
            <?php
            $count = 0;
            while ($wp_query_slides_pagination->have_posts()): $wp_query_slides_pagination->the_post(); ?>
                <?php $slides_breadcrumb = get_post_meta(get_the_ID(), '_cmb_slides_breadcrumb', true); ?>

                <li class="pill-<?php $count ?>" data-target="#myCarousel" data-slide-to="<?php echo $count; ?>"
                    class="<?php if ($count == 0) {
                        echo 'active';
                    } ?>">
                    <a href="#"><?php echo $slides_breadcrumb; ?></a>
                </li>
                <?php $count++;
            endwhile;
            ?>
        </ul>


    </div><!-- End Carousel -->

<?php }


/// **** Loading Recommended Readings **** ///

function bp_recommended_readings($post)
{

    $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $individual_category)
            $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 4, // Number of related posts that will be shown.
            'caller_get_posts' => 1
        );

        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post(); ?>

                <?php echo '<div class="col-sm-3 col-md-3 homepage-thumbnail-mobile">'; ?>
                <?php get_template_part('content', (post_type_supports(get_post_type(), 'post-formats') ? get_post_format() : get_post_type())); ?>
                <?php echo '</div>'; ?>

                <?php
            }
        }
    }
    $post = $orig_post;
    wp_reset_query();
}

function bp_facebook_comments()
{
    // Need to check whether FB comments plugin is activated
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (is_plugin_active('facebook-comments-plugin/facebook-comments.php')) {
        echo do_shortcode('[fbcomments]');
    }
}

function bp_the_content_by_id( $post_id=0, $more_link_text = null, $stripteaser = false ){
    global $post;
    $post = get_post($post_id);


    return $post->post_content;
}

//Search From
// This one is not working
function new_clymene_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . esc_url(home_url( '/' )) . '" >
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__("Themen suchen","clymene").'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'new_clymene_search_form', 1 );

// Filter Category title

function widget_categories_args_filter( $cat_args ) {
    $exclude_arr = array( 4 );

    if( isset( $cat_args['exclude'] ) && !empty( $cat_args['exclude'] ) )
        $exclude_arr = array_unique( array_merge( explode( ',', $cat_args['exclude'] ), $exclude_arr ) );
    $cat_args['exclude'] = implode( ',', $exclude_arr );
    return $cat_args;
}

add_filter( 'widget_categories_args', 'widget_categories_args_filter', 10, 1 );

// Return the Category Title when on Category Page

function categories_widget_title($title, $instance = null, $id_base = null) {

    if(!empty($id_base)) :
    if ( 'recent-posts' == $id_base && is_category()) {
        $category = get_category( get_query_var( 'cat' ) );
        return __('Alles zum Thema '. $category->name .'');
    }
    else {
        return $title;
    }
        endif;
}

add_filter ( 'widget_title' , 'categories_widget_title', 10, 3); //we use the default priority and 3 arguments in the callback function


function highlight_current_post($url) { ?>
    <script>
    //console.log('<?php echo $url ?>');
    window.onload = function () {
        var entries = jQuery('.widget_recent_entries ul li a[href="<?php echo $url; ?>"]');
        entries.addClass("current-post")
    };
    </script>
<?php }