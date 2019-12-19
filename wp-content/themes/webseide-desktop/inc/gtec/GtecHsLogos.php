<?php

$gtecHsLogos = new GtecHsLogos();

class GtecHsLogos
{
    const POST_TYPE = 'hs_logo',
        LOGOS_ARRAY_CACHE = self::POST_TYPE . '_array_cache';

    /**
     * Logo Variationen
     *
     * @var array
     */
    protected $logoColors = [
		[
			'key' => 'field_58512b3724892',
			'label' => 'Original Logo',
			'name' => 'original-logo',
		],
        [
            'key' => 'field_58512b3724891',
            'label' => 'Silber',
            'name' => 'silber',
        ],
        [
            'key' => 'field_58512cf524894',
            'label' => 'Schwarz',
            'name' => 'schwarz',
        ],
        [
            'key' => 'field_58512cf424893',
            'label' => 'Gold',
            'name' => 'gold',
        ]
    ];

    /**
     * Basis konfiguration für die Logos
     * @var array
     */
    protected $baseLogoField = array(
        'type' => 'image',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
    );

    /**
     * GtecHsLogos constructor.
     */
    function __construct()
    {
        add_action('init', array($this, 'registerPostType'));
        add_action('init', array($this, 'acf'));
        add_action( 'save_post', [$this, 'savePost'], 10, 2 );
    }

    /**
     * Save post
     *
     * @param int $postId The post ID.
     * @param WP_post $logo The post object.
     */
    function savePost( $postId, $logo ) {
        if ( $logo->post_type == self::POST_TYPE ) {
            /**
             * Regenerate LogosArrayCache
             */
            delete_transient( self::LOGOS_ARRAY_CACHE );
            self::getLogosArray();
            /**
             * Update single Logo after save
             */
            $logosArray = self::getLogosArray();
            #$key = array_search(40489, array_column($logosArray, 'uid'));
            #$logosArray[$key] = self::getLogoDetails($logo);
            #set_transient( self::LOGOS_ARRAY_CACHE, $logosArray );
        }
    }

    /**
     *
     * @return array
     */
    static public function getLogosArray() {
        if ( false === ( $logosArray = get_transient( self::LOGOS_ARRAY_CACHE ) ) ) {
            $hsLogos         = get_posts(
                [
                    'post_type'   => self::POST_TYPE,
                    'numberposts' => - 1,
                ]
            );
            $logosArray = [];
            foreach ( $hsLogos as $hsl ) {
                $logosArray[] = self::getLogoDetails($hsl);
            }
            set_transient( self::LOGOS_ARRAY_CACHE, $logosArray );
        }
        return $logosArray;
    }

    /**
     * @param WP_post $logo
     *
     * @return array
     */
    static private function getLogoDetails($logo){
        $fields = get_fields( $logo->ID );

        return [
            "id"    => $logo->ID,
            "title" => $logo->post_title,
            "logo"  => [
                "silber"  => $fields['silber']['url'],
                "schwarz" => $fields['schwarz']['url'],
                "gold"    => $fields['gold']['url'],
            ],
			"country" => $fields['gtec_logo_country']
        ];
    }

    /**
     * Registrieren der benötigten Post Types
     */
    function registerPostType()
    {
        register_post_type(self::POST_TYPE,
            array(
                'labels' => array(
                    'name' => __('Hochschul Logos'),
                    'singular_name' => __('Hochschul Logo')
                ),
                'public' => false,
                'show_ui' => true,
                'supports' => ['title']
            )
        );
    }

    /**
     * Erstellt die Konfiguration der Felder für ACF
     *
     * @return array
     */
    function getAcfLogoFieldsConfig()
    {
        $fieldsConfig = [];
        foreach ($this->logoColors as $config) {
            $fieldsConfig[] = $this->baseLogoField + $config;
        }
        return $fieldsConfig;
    }

    /**
     * Führt die ACF Konfiguration durch
     */
    function acf()
    {
        acf_add_local_field_group(array(
            'key' => 'group_58512b04ab245',
            'title' => 'Logovariationen',
            'fields' => $this->getAcfLogoFieldsConfig(),
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

		acf_add_local_field_group(array(
			'key' => 'group_58512b04ab245_country',
			'title' => 'Logo Land',
			'fields' => [
				[
					'key' => 'gtec_logo_country',
					'label' => 'Logo Land',
					'name' => 'gtec_logo_country',
					'type' => 'text'
				]
			],
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
}
