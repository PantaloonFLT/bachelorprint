<?php

//Visual Composer Plagiatshop Element

if (!class_exists("Plagiatshop")) {

    class Plagiatshop
    {
        public static $shortcode_name = "plagiatshop";

        /**
         * Summary constructor.
         */
        public function __construct()
        {
            add_shortcode(self::$shortcode_name, array($this, "shortcode"));
            add_action("vc_before_init", array($this, "vcIntegration"));
        }

		/**
		 * Add Shortcode to Visual Composer
		 */
		public function vcIntegration()
		{
			vc_map(array(
				"name" => "Plagiatshop",
				"base" => self::$shortcode_name,
				"icon" => get_stylesheet_directory_uri() . "/vc_templates/ww_shortcode_icon.png",
				"category" => "Webworker",
				"params" => array(
					array(
						"type" => "textfield",
						"heading" => esc_html__("Custom CSS Class", 'webworker'),
						"param_name" => "class",
						"value" => "",
					),
					array(
						'type' => 'textfield',
						'holder' => 'p',
						'class' => 'title-class',
						'heading' => __('URL', 'text-domain'),
						'param_name' => 'link_url',
						'value' => __('https://test.de', 'text-domain'),
						'description' => __('Link, zB /online-shop/', 'text-domain'),
						'admin_label' => false,
						'group' => 'Custom Group',
					)
				)
			));
		}

        /**
         * Shortcode output
         *
         * @param $atts
         * @param null $content
         * @return string
         */
        public function shortcode($atts, $content = null)
        {

			extract( shortcode_atts( array(
					'link_url' => '',
				), $atts )
			);

			ob_start();

            $output = "";

            $output .= "
            <style>#plag-iframe {width: 100%;}</style>
            <iframe id='plag-iframe' src='". $atts['link_url'] ."' frameborder='0' allowfullscreen></iframe>
            ";

            return $output;
        }

    }

    new Plagiatshop();

} // class exists