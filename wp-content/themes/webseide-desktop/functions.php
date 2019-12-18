<?php

#if ( !class_exists( 'ReduxFramework' ) && file_exists( get_stylesheet_directory() . '/ReduxFramework/ReduxCore/framework.php' ) ) {
#    require_once( get_stylesheet_directory() . '/ReduxFramework/ReduxCore/framework.php' );
#}
#if ( !isset( $redux_demo ) && file_exists( get_stylesheet_directory() . '/ReduxFramework/sample/sample-config.php' ) ) {
#    require_once( get_stylesheet_directory() . '/ReduxFramework/sample/sample-config.php' );
#}

require_once(get_stylesheet_directory() . '/inc/widgets.php');
require_once(get_stylesheet_directory() . '/inc/bp_shortcodes.php');
require_once(get_stylesheet_directory() . '/inc/bp-walker-nav-menu.php');
require_once(get_stylesheet_directory() . '/inc/wp_bootstrap_navwalker.php');
include_once(get_stylesheet_directory() . '/inc/vcProductElement.php');
include(get_stylesheet_directory() . '/vc_templates/vc_plagiatshop.php');
include(get_stylesheet_directory() . '/vc_templates/vc_bachelorprintiframe.php');
include_once(get_stylesheet_directory() . '/inc/blog-hooks.php');       /* @TODO: behalten und aussortieren weiter auf 292 */
include_once(get_stylesheet_directory() . '/inc/widgets.php');          /* @TODO: behalten und aussortieren */
include_once(get_stylesheet_directory() . '/inc/meta-boxes.php');    /* @TODO: behalten und aussortieren */
include_once(get_stylesheet_directory() . '/inc/register-meta.php');    /* @TODO: behalten und aussortieren */
#include_once(get_stylesheet_directory() . '/inc/content-boxes.php');    /* @TODO: Alternatve umsetzen */
#include_once(get_stylesheet_directory() . '/inc/GtecTextBlock.php');    /* @TODO: Alternatve umsetzen */
#include_once(get_stylesheet_directory() . '/inc/PopupTop.php');         /* @TODO: Alternatve umsetzen */
#require get_stylesheet_directory() .'/inc/phpQuery.php'; //@TODO: remove file and rerwrite code




/**
 * Load files to extend 'Admin > Themes > Menus > Add sub menu'
 * Required to load and show main menu items
 * */
add_action('carbon_fields_register_fields','crb_attach_theme_options');
function crb_attach_theme_options() {
    require get_stylesheet_directory().'/inc/custom-fields.php';
}


/**
 * Load and boot carbon fields after theme setup
 * */
add_action('after_setup_theme', 'crb_load');
function crb_load() {
    require_once (get_stylesheet_directory() .'/inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


/**
 * Load language files
 * */
load_theme_textdomain('bachelorprint', get_stylesheet_directory() . '/languages');


/**
 * Init image sizes
 * */
add_action('after_setup_theme', 'wpse_setup_theme');
function wpse_setup_theme(){
    add_theme_support('post-thumbnails');
    add_image_size('cart-preview', 120, 173);       /* 120 pixels wide (and unlimited height) */
    add_image_size('bp-thumbnail', 270, 180, true); /* custom thumbnails with ratio 3:2 and hard crop */
    add_image_size('home-blog', 768, 512);          /* 512 wide */
}


/**
 * Enqueue scripts and styles for child theme
 * Enqueue scripts and styles for shop system
 * */
add_action('wp_enqueue_scripts', 'child_theme_scripts');
function child_theme_scripts() {
    wp_enqueue_script('webseide-child-theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'));
    wp_enqueue_script('bp-scripts', get_stylesheet_directory_uri() . '/js/bp-scripts.js', array('jquery'), false, true);
    #wp_enqueue_script('custom-index', get_stylesheet_directory_uri() . "/js/custom-index.js", array('jquery'), false, true);
    //wp_enqueue_script('bp-header_inject', get_stylesheet_directory_uri() . '/../shopware_src/header_inject.js', array('jquery'), false, true);

    wp_register_style('plugin-google-font-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,700');
    wp_enqueue_style('plugin-google-font-lato');
    add_action('wp_enqueue_scripts', function(){
        wp_dequeue_style('plugin-google-font-lato');
    }, 99);

    wp_localize_script( 'bp-scripts', 'bpLocalize', array(
        'langCode' => ICL_LANGUAGE_CODE,
        'configurator' => array(
            'config_' . ICL_LANGUAGE_CODE => array(
                'tlsShopUrl'         => constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))
                ? constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))['tlsShopUrl']
                : '',
                'tlsSubShopUrl'      => constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))
                ? constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))['tlsSubShopUrl']
                : '',
                'tlsConfiguratorUrl' => constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))
                ? constant('BP_CODE_' . mb_strtoupper(ICL_LANGUAGE_CODE))['tlsConfiguratorUrl']
                : '',
                'headerInjectJS' => '/wp-content/themes/webseide-desktop/js/header_inject.js',
                'flipclockJS' => '/wp-content/themes/webseide-desktop/js/flipclock.min.js',
            ),
        )
    ));
}


/**
 * Remove the widget title filter from parent theme
 * Add a new widget title filter to hide widget titles starting with '_'
 *
 * @param string
 * @return string
 * */

add_action('init', function(){
    remove_filter('widget_title','remove_widget_title');
    add_filter('widget_title','manage_widget_title');
});

function manage_widget_title($widget_title){
    if(substr($widget_title, 0, 1) == '_'){
        return;
    }
    return $widget_title;
}


/**
 * Get the phone number to show in top header
 * @TODO: Convert this to multilanguage widgets and remove this function
 *
 * @return string
 * */
function bp_get_phone(){
    if(in_array(ICL_LANGUAGE_CODE, array('de', 'en', 'pl', 'at', 'ch', 'tr', 'nl', 'fr', 'it', 'es'))){
        return carbon_get_theme_option( 'crb_phone_' . ICL_LANGUAGE_CODE );
    }
    return carbon_get_theme_option( 'crb_phone_en' );
}


/**
 * Get the phone number to show in top header
 * Rename language names to language keys
 *
 * Used in the following files:
 *  \partials\header-custom.php
 *
 * @return string
 * */
function bp_get_lang() {
    $bp_language_selector = ob_start();
    do_action('wpml_add_language_selector');
    $bp_language_selector = ob_get_clean();
    $bp_language_selector = strtr($bp_language_selector, array('English' => 'EN', 'Deutsch' => 'DE', 'polski' => 'PL', 'Österreich' => 'AT', 'Schweiz' => 'CH', 'Türkçe' => 'TR', 'Nederlands' => 'NL', 'Français' => 'FR', 'Italiano' => 'IT', 'Español' => 'ES'));
    return $bp_language_selector;
}


/**
 * Used in the following files:
 *  \inc\bp-walker-nav-menu.php
 *  \partials\header-custom.php
 *
 * @param $phone
 * @return string
 *
 * @TODO: inspect
 * */
function bp_get_block_contacts($phone){
    $all_lanuage = bp_get_lang();
    $lang_code = ICL_LANGUAGE_CODE;
    $is_en = strpos( $all_lanuage, 'icl-en' );
    if( $lang_code !== 'de' && !$is_en ) {
        $obj_language = phpQuery::newDocument( $all_lanuage );
        $obj_language->find( 'li.icl-de' )->remove();
        $obj_language->find( 'icl-'.$lang_code )->addClass( 'bp-one-lang' );
        $html_language = $obj_language->html();
        $chevron = '';
    } else {
        $html_language = $all_lanuage;
        $chevron = '<span class="bp-toggle-lang lnr lnr-chevron-down"></span>';
    }

    if( $phone ) {
        $bp_mob_phone = '<span class="bp-mob-phone"><span class="lnr lnr-phone-handset"></span>'.$phone.'</span><span class="bp-mob-language">'.$html_language.$chevron.'</span>';
    } else {
        $bp_mob_phone = '<span class="bp-mob-language">'.$html_language.$chevron.'</span>';
    }
    $bp_contacts_mobile = '
        <div class="bp-contacts-mobile">
            <ul class="bpconmobel">
                <li>
                    <form role="search" method="get" id="" class="bp-searchform-mobile" action="'.esc_url( home_url( '/' ) ).'">
                        <input type="text" value="'.get_search_query().'" name="s" placeholder="'.__("Search...", "bachelorprint").'">
                        <span class="lnr lnr-magnifier"></span>
                    </form>
                </li>
                <li class="bp-phlan">'.$bp_mob_phone.'</li>
            </ul>
        </div>
    ';
    return $bp_contacts_mobile;
}


/**
 * Get the author meta by field name
 *
 * Used in the following files:
 *  \inc\blog-hooks.php
 *
 * @param $field
 * @return string
 * */
function gtec_get_the_author_meta($field){
    return gtec_explode_language_content(get_the_author_meta($field));
}


/**
 * Split the given content by a delimiter and return the certain
 * fragment for the current language
 *
 * Used in the following files:
 *  \functions.php @gtec_get_the_author_meta()
 *
 * @param $content
 * @return string
 * */
function gtec_explode_language_content($content) {
    $contentMap = array();
    $count = 0;
    $key = null;
    foreach (explode('###', $content) as $contentSegment) {
        if ($count == 0) {
            $content = $contentSegment;
        } else if ($count % 2 == 1) {
            $key = strtolower($contentSegment);
        } else {
            $contentMap[$key] = $contentSegment;
        }
        $count++;
    }
    if (ICL_LANGUAGE_CODE != 'de' && array_key_exists(ICL_LANGUAGE_CODE, $contentMap)) {
        $content = $contentMap[ICL_LANGUAGE_CODE];
    }
    return $content;
}


/**
 * Extend the body classes by the active language 'active-lang-{lang}'
 *
 * @param $classes
 * @return array
 * */
add_filter('body_class','wp_body_classes');
function wp_body_classes($classes) {
    if(defined('ICL_LANGUAGE_CODE')){ $classes[] = 'active-lang-' . ICL_LANGUAGE_CODE; }
    return $classes;
}


/**
 * Enable/Disable progress bar
 *
 * Used in the following files:
 *  \page-templates\template-fullwidth.php
 *  \page-templates\template-home.php
 *  \page-templates\template-normal.php
 *
 * @return bool
 * */
function gtec_show_progressbar(){
    return false;
    return gtec_is_shop_active();
}


/**
 * Set a cookie for the shop affiliate progress
 * */
add_action('init', 'affiliate_cookie');
function affiliate_cookie(){
    if(isset($_GET['partner']) && '' != $_GET['partner']){
        setcookie('partner', $_GET['partner'], time()+2592000, '/');
        $_COOKIE['partner'] = $_GET['partner'];
    }
}


/**
 * Protection:
 * Remove the wordpress comment
 * Remove the version parameters in css and javascript urls
 * Disable XMLRPC
 * Set default error message on login errors
 * */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');
add_filter('script_loader_src', 'rem_wp_ver_css_js', 9999);
add_filter('style_loader_src', 'rem_wp_ver_css_js', 9999);
add_filter('xmlrpc_enabled', '__return_false');
add_filter('login_errors', 'login_obscure_func');
function login_obscure_func(){ return 'Error'; }
function rem_wp_ver_css_js($src){
    if (strpos( $src, 'ver=')){
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}


/**
 * Extend tablepress tables by 'style="overflow-x:auto;"'
 *
 * @return string
 * */
add_filter( 'the_content', 'bp_filter_tablepress', 999 );
function bp_filter_tablepress( $content ) {
    $content = preg_replace('#<table id="tablepress-(.*?)tablepress-id-(.*?)>(.*?)</table>#is', '<div style="overflow-x:auto;" class="bp-tablepress-container">$0</div>', $content);
    return $content;
}


/**
 * Set custom upload directory for visual form builder
 *
 * @param $upload
 * @return mixed
 */
add_filter('upload_dir', 'vfb_upload_dir');
function vfb_upload_dir($upload){
    if(isset($_POST['vfb-submit'])){
        $dir = $_SERVER['DOCUMENT_ROOT'] . UPLOADS . '/vfb-uploads';
        $url = WP_CONTENT_URL . '/vfb-uploads';
        $bdir = $dir;
        $burl = $url;
        $subdir = '';
        $dir .= $subdir;
        $url .= $subdir;

        $upload['path'] = $dir;
        $upload['url'] = $url;
        $upload['subdir'] = $subdir;
        $upload['basedir'] = $bdir;
        $upload['baseurl'] = $burl;
        $upload['error'] = false;
    }
    return $upload;
}


/********************************************************** DELUCKS TESTING **********************************************************/


add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );



#require_once(get_stylesheet_directory() . '/debug.php'); //delucks debug helper
#echo "<pre>";
#var_dump(delucks_find_shortcode_posts('custom_nav'));
#echo "</pre>";

?>