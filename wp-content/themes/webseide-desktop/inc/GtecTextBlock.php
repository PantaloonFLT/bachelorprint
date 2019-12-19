<?php

/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 01.12.2016
 * Time: 10:29
 */
class GtecTextBlock
{
	const POST_TYPE = 'gtec_text_block';
	const LOGOS_ARRAY_CACHE = self::POST_TYPE . '_array_cache';

	/**
	 * ACF Fields.
	 *
	 * @var array
	 */
	protected $fields = [
		[
			'key' => 'gtec_text_block_code',
			'label' => 'Text-Block Code',
			'name' => 'gtec_text_block_code',
		],
	];

	/**
	 * Basis konfiguration für die ACF Fields
	 * @var array
	 */
	protected $baseField = array(
		'type' => 'text',
	);

    function __construct()
    {

        add_action('init', array($this, 'createTextBlockPostType'));
        add_shortcode('textblock', array($this, 'shortcodeTextBlock'));
        add_filter('option_wc_settings_tab_calculator-description', array($this, 'filter_option_wc_settings_tab_calculator_description'));

    }

    function filter_option_wc_settings_tab_calculator_description($content)
    {
        return apply_filters('the_content', $content);
    }

    function createTextBlockPostType()
    {
        //build in suitable labels, according to :
        // https://codex.wordpress.org/Function_Reference/register_post_type

        //kein URL in textBlock erlaubt!
        register_post_type(self::POST_TYPE,
            array(
                'label' => 'Textblock',
                //sodass dem Element kein Permalink gehört.
                'public' => true,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
                'has_archive' => false,
                'rewrite' => false,
                'query_var' => false,
                'supports' => array('title', 'editor'),
				'attributes' => array(
					'gtec_test_1' => array()
				)
            )
        );

		acf_add_local_field_group(array(
			'key' => 'group_' . self::POST_TYPE,
			'title' => 'Text Block Attributes',
			'fields' => $this->getAcfFieldsConfig(),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => self::POST_TYPE,
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

    }

	/**
	 * Erstellt die Konfiguration der Felder für ACF
	 *
	 * @return array
	 */
	function getAcfFieldsConfig()
	{
		$fieldsConfig = [];
		foreach ($this->fields as $config) {
			$fieldsConfig[] = $this->baseField + $config;
		}
		return $fieldsConfig;
	}

    function shortcodeTextBlock($atts)
    {
        $atts = shortcode_atts(array(
            'id' => false,
			'code' => false
        ), $atts, 'textblock');

		$post_id = $atts['id'];

        if (!$atts['id'] && $atts['code']) {
			$posts = get_posts(array(
				'numberposts'	=> -1,
				'post_type'		=> self::POST_TYPE,
				'meta_key'		=> 'gtec_text_block_code',
				'meta_value'	=> $atts['code']
			));
			if (count($posts) > 0) {
				$post_id = $posts[0]->ID;
			}
		}

		// translate post id
        $post_id = apply_filters('wpml_object_id', $post_id, 'gtec_text_block', TRUE);

        //get the post ID and print the content
        $post = get_post($post_id);
        if ($post && $post->post_type == self::POST_TYPE) {

            $content = $post->post_content;

            remove_filter('the_content', 'wpautop');
            $content = apply_filters('the_content', $content);
            add_filter('the_content', 'wpautop');

            if ($content == null) {
                return "";
            }
            return $content;
        } else {
            return 'Kein Element gefunden';
        }
    }

}

add_shortcode('textBlockText', 'short_code_output');

$gtecTextBlock = new GtecTextBlock();