<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 26-02-16
 * Time: 17:57
 */


/**
 * Register meta boxes
 **
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */



function sb_register_meta_boxes($meta_boxes)
{
    $prefix = '_cmb_';
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'slides-meta',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Additional Fields', 'bachelorprint'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('slides'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name' => __('Breadcrumb', 'slides-breadcrumb'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_breadcrumb",
                // Field description (optional)
                'desc' => __('Breadcrumb for the Slider Navigation', 'slides-breadcrumb'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Text Color', 'slides-text-color'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_text_color",
                // Field description (optional)
                'desc' => __('This overwrites the standard color', 'slides-text-color'),
                'type' => 'color',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Text Shadow', 'pages-text-shadow'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}pages_text_shadow",
                // Field description (optional)
                'desc' => __('Select Text Shadow', 'pages-text-shadow'),
                'type' => 'select',
                'options' => array('text-shadow-1' => 'Shadow Effect 1', 'text-shadow-2' => 'Shadow Effect 2', 'text-shadow-3' => 'Shadow Effect 3', 'text-shadow-4' => 'Shadow Effect 4', 'text-shadow-5' => 'Shadow Effect 5', 'text-shadow-6' => 'Background Effect Black', 'text-shadow-7' => 'Background Effect Grey')
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Small Top Header', 'slides-top-small-header'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_top_small_header",
                // Field description (optional)
                'desc' => __('Top Header Small', 'slides-top-small-header'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Headline', 'slides-top-header'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_top_header",
                // Field description (optional)
                'desc' => __('Top Header Big', 'slides-top-header'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Description', 'slides-description'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_description",
                // Field description (optional)
                'desc' => __('Description', 'slides-description'),
                'type' => 'textarea',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Button Title', 'slides-button-title'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_button_title",
                // Field description (optional)
                'desc' => __('Title for the Button', 'slides-button-title'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Button link', 'slides-button-link'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}slides_button_link",
                // Field description (optional)
                'desc' => __('Category to Point to', 'slides-button-link'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
        ));
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'slide_buttons',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Header Settings', 'cm'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('page'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            // TEXT
            array(
                // Field name - Will be used as label
                'name' => __('Text Color', 'pages-text-color'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}pages_text_color",
                // Field description (optional)
                'desc' => __('This overwrites the standard color', 'pages-text-color'),
                'type' => 'color',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Text Shadow', 'pages-text-shadow'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}pages_text_shadow",
                // Field description (optional)
                'desc' => __('Select Text Shadow', 'pages-text-shadow'),
                'type' => 'select',
                'options' => array('text-shadow-1' => 'Shadow Effect 1', 'text-shadow-2' => 'Shadow Effect 2', 'text-shadow-3' => 'Shadow Effect 3', 'text-shadow-4' => 'Shadow Effect 4', 'text-shadow-5' => 'Shadow Effect 5', 'text-shadow-6' => 'Background Effect Black', 'text-shadow-7' => 'Background Effect Grey')
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            )
        ));
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => "{$prefix}themes_list",
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Themen in Überblick', "{$prefix}themes_list"),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('post'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            // TEXT
            array(
                'name' => __('AnchorPoints', "{$prefix}themes_list_jump"),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}themes_list_jump",
                // Field description (optional)
                'desc' => __('AchorPoints', "{$prefix}themes_list_jump"),
                'type' => 'key_value',
            )
        )
    );

    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'content-box-meta',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __('Additional Fields for Content Box', 'bachelorprint'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('content_box'),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',
        // Auto save: true, false (default). Optional.
        'autosave' => true,
        // List of meta fields
        'fields' => array(
            // TEXT
            array(
                'name' => __('Link to Page', "{$prefix}link_to_page"),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}link_to_page",
                // Field description (optional)
                'desc' => __('Link to a Page', "{$prefix}link_to_page"),
                'type' => 'post',
                'post_type' => 'page',
                'field_type' => 'select',
                'placeholder' => 'select page'
            ),
            array(
                // Field name - Will be used as label
                'name' => __('Use URL instead', 'content-box-url-option'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}content_box_url_option",
                // Field description (optional)
                'desc' => __('Decide what to use', 'content-box-url-description'),
                'type' => 'checkbox',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            ),
            array(
                // Field name - Will be used as label
                'name' => __('URL', 'content-box-url'),
                // Field ID, i.e. the meta key
                'id' => "{$prefix}content_box_url",
                // Field description (optional)
                'desc' => __('No need to add the Site URL (http)', 'content-box-url-description'),
                'type' => 'text',
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
            )
        )
    );

    $meta_boxes[] = array(
        'id'            => 'ref_shortcode_description',
        'title'         => '[ref] - Shortcode Erklärung',
        'post_types'    => array('post'),
        'context'       => 'side',
        'priority'      => 'low',
        'fields'        => array(
            array(
                'name' => 'Erklärung',
                'id' => "ref_desc",
                'desc' => __('<ul><li>Der <strong>"ref_name"</strong> muss einzigartig sein. Für jeden neuen "ref_name" wird ein neues Quellenverzeichnis-Element erstellt.</li><br>
                <li>Der <strong>"ref_text"</strong> beinhaltet die ausformulierte Quellenangabe. Diese muss jedoch nur bei dem ersten Vorkommen des jeweiligen Quellenverzeichnis-Verweises mit angegeben werden.<br>
                Hierbei muss jedoch zwischen z.B. (vgl. Kruse 2010) und (vgl. Kruse 2005) unterschieden werden, da es sich hierbei um unterschiedliche Quellen handelt und diese auch dementsprechend behandelt werden müssen.</li><br>
                <li>Bei mehreren Fußnoten in einem Verweis müssen diese unabhängig voneinaner markiert werden.<br>
                <strong>Beispiel:</strong><br>
                ([ref]vgl. Bänsch & Alewell 2013: 13[/ref]; [ref]Franck & Stary 2009: 139[/ref])</li>
                <li>Das Visual Composer Textelement, welches das generierte Quellenverzeichnis beinhalten soll, muss die CSS-Klasse <strong>"ref-container"</strong> erhalten.</li></ul>', 'bachelorprint'),
                'type' => 'text',
                'std' => __( '[ref ref_name="Autor2004" ref_text="Beschreibung"]Fussnote[/ref]', 'bachelorprint' ),
            )
        )
    );
    return $meta_boxes;


}



/**
 * Registering meta boxes
 */
add_filter('rwmb_meta_boxes', 'sb_register_meta_boxes');





add_action('wc_cpdf_init', 'wc_custom_product_data_fields', 10, 0);
function wc_custom_product_data_fields()
{
    $custom_product_data_fields = array();
    /** First product data tab starts **/
    /** ===================================== */
    $custom_product_data_fields['custom_data_1'] = array(
        array(
            'tab_name' => __('Custom Data', 'wc_cpdf'),
        ),
        // image
        array(
            'id' => '_back_image',
            'type' => 'image',
            'label' => __('Back', 'wc_cpdf'),
            'description' => __('Image for back of the product', 'wc_cpdf'),
            'desc_tip' => true,
        ),
        // image
        array(
            'id' => '_side_image',
            'type' => 'image',
            'label' => __('Side', 'wc_cpdf'),
            'description' => __('Image for the side of the product', 'wc_cpdf'),
            'desc_tip' => true,
        ),
        // image
        array(
            'id' => '_front_image',
            'type' => 'image',
            'label' => __('Front', 'wc_cpdf'),
            'description' => __('Image for the front of the product', 'wc_cpdf'),
            'desc_tip' => true,
        )
    );
    return $custom_product_data_fields;
}

add_action( 'wcpdf_variation_fields_init', 'save_variation_settings_fields', 10, 2 );
function save_variation_settings_fields()
{
    $custom_product_data_fields =array(
        array(
            'id' => '_back_image',
            'type' => 'image',
            'label' => __('Back', 'wc_cpdf'),
            'description' => __('Image for back of the product', 'wc_cpdf'),
            'desc_tip' => true,
        ),
        // image
        array(
            'id' => '_side_image',
            'type' => 'image',
            'label' => __('Side', 'wc_cpdf'),
            'description' => __('Image for the side of the product', 'wc_cpdf'),
            'desc_tip' => true,
        ),
        // image
        array(
            'id' => '_front_image',
            'type' => 'image',
            'label' => __('Front', 'wc_cpdf'),
            'description' => __('Image for the front of the product', 'wc_cpdf'),
            'desc_tip' => true,
        )
    );
    return $custom_product_data_fields;
}
