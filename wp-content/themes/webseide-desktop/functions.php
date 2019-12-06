<?php
require_once(get_stylesheet_directory() .'/inc/widgets.php');
#require_once(get_stylesheet_directory() .'/inc/bp_shortcodes.php');
require_once(get_stylesheet_directory() .'/inc/bp-walker-nav-menu.php');
require_once(get_stylesheet_directory() .'/inc/wp_bootstrap_navwalker.php');
require get_stylesheet_directory() .'/inc/phpQuery.php'; //@TODO: remove file and rerwrite code


// Enqueue scripts and styles
function child_theme_scripts() {
    wp_enqueue_script('webseide-child-theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'));
    wp_enqueue_script('bp-scripts', get_stylesheet_directory_uri() . '/js/bp-scripts.js', array('jquery'), false, true);

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
add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );


/**
 * Get menu names.
 * @TODO: copy db table
 */
function bp_get_menu_names() {
    global $wpdb;
    $icl_translations = '8277uuh_icl_translations';
    $icl_language_code = ICL_LANGUAGE_CODE;
    $result_query = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT name FROM $wpdb->term_taxonomy,$wpdb->terms,8277uuh_icl_translations
            WHERE taxonomy = 'nav_menu'
            AND $icl_translations.element_type = 'tax_nav_menu'
            AND $icl_translations.element_id = term_taxonomy_id
            AND $icl_translations.language_code = %s
            AND $wpdb->terms.term_id=term_taxonomy_id
            AND count > 0
            ORDER BY $wpdb->terms.name ASC", array( $icl_language_code )
            ), ARRAY_N
        );
    foreach( $result_query as $name ) {
        $names_menu[$name[0]] = $name[0];
    }
    return $names_menu;
}

function bp_get_phone(){
    if(in_array(ICL_LANGUAGE_CODE, array('de', 'en', 'pl', 'at', 'ch', 'tr', 'nl', 'fr', 'it', 'es'))){
        return carbon_get_theme_option( 'crb_phone_' . ICL_LANGUAGE_CODE );
    }
    return carbon_get_theme_option( 'crb_phone_en' );
    //restliche code unn�tig

    switch( ICL_LANGUAGE_CODE ) {
        case 'de':
            $phone = carbon_get_theme_option( 'crb_phone_de' );
            break;
        case 'en':
            $phone = carbon_get_theme_option( 'crb_phone_en' );
            break;
        case 'pl':
            $phone = carbon_get_theme_option( 'crb_phone_pl' );
            break;
        case 'at':
            $phone = carbon_get_theme_option( 'crb_phone_at' );
            break;
        case 'ch':
            $phone = carbon_get_theme_option( 'crb_phone_ch' );
            break;
        case 'tr':
            $phone = carbon_get_theme_option( 'crb_phone_tr' );
            break;
        case 'nl':
            $phone = carbon_get_theme_option( 'crb_phone_nl' );
            break;
        case 'fr':
            $phone = carbon_get_theme_option( 'crb_phone_fr' );
            break;
        case 'it':
            $phone = carbon_get_theme_option( 'crb_phone_it' );
            break;
        case 'es':
            $phone = carbon_get_theme_option( 'crb_phone_es' );
            break;
        default: $phone = carbon_get_theme_option( 'crb_phone_en' );
    }
    return $phone;
}

function bp_get_lang() {
    $bp_language_selector = ob_start();
    do_action('wpml_add_language_selector');
    $bp_language_selector = ob_get_clean();
    $repl = array(
        'English'    => 'EN',
        'Deutsch'    => 'DE',
        'polski'     => 'PL',
        'Österreich' => 'AT',
        'Schweiz'    => 'CH',
        'Türkçe'     => 'TR',
        'Nederlands' => 'NL',
        'Français'   => 'FR',
        'Italiano'   => 'IT',
        'Español'    => 'ES'
    );
    $bp_language_selector = strtr( $bp_language_selector, $repl );
    return $bp_language_selector;
}

function bp_get_block_contacts( $phone ) {
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
    #return $bp_contacts_mobile;
}

/**
 * Carbon-fields.
 */
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once (get_stylesheet_directory() .'/inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields','crb_attach_theme_options');
function crb_attach_theme_options() {
    require get_stylesheet_directory().'/inc/custom-fields/custom-fields.php';
}


/**
 * Extend dynamic_sidebar function.
 *
 * @param $index
 */
function gtec_dynamic_sidebar($index) {
    if (ICL_LANGUAGE_CODE != 'de') {
        $index .= '_' . ICL_LANGUAGE_CODE;
    }
    dynamic_sidebar($index);
}

/**
 * Get translatable author meta.
 * @param $field
 */
function gtec_get_the_author_meta($field) {
    $content = get_the_author_meta($field);
    return gtec_explode_language_content($content);
}

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


/** Remove Google Fonts */
add_action( 'wp_enqueue_scripts', 'plugin_setup_styles' );

function plugin_setup_styles() {
  // it may not be quite this simple, depending on what the plugin is doing
  wp_register_style( 'plugin-google-font-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,700' );
  wp_enqueue_style( 'plugin-google-font-lato' );
  add_action( 'wp_enqueue_scripts', function() {
  wp_dequeue_style( 'plugin-google-font-lato' );
}, 99 );
}

?>