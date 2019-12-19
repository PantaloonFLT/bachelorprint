<?php

//Visual Composer Summary Element

if (!class_exists("Summary")) {

    class Summary {
        public static $shortcode_name = "summary";

        /**
         * Summary constructor.
         */
        public function __construct() {
            add_shortcode(self::$shortcode_name, array($this, "shortcode"));
            add_action("vc_before_init", array($this, "vcIntegration"));
        }

        /**
         * Shortcode output
         *
         * @param $atts
         * @param null $content
         * @return string
         */
        public function shortcode($atts, $content = null) {

            $atts = shortcode_atts(array(
                "headline" => "Inhaltsverzeichnis",
            ), $atts);

            // extract($atts);

            $output =   "<section class='vc_rows wpb_rows vc_rows-fluid index'>" .
                            "<div class='container'>" .
                                "<div class='wpb_column vc_column_container nine columns'>" .
                                    "<div class='scroll_headline-container'>" .
                                        "<p class='scroll_headline'>{$atts['headline']}</p>" .
                                    "</div>" .
                                    "<ul id='inner_scroll_container'>" .
                                    "</ul>" .
                                "</div>" .
                            "</div>" .
                        "</section>";

            return $output;
        }

        /**
         * Add Shortcode to Visual Composer
         */
        public function vcIntegration() {
            vc_map(array(
                "name"		=> "Inhaltsverzeichnis",
                "base"		=> self::$shortcode_name,
                "icon"		=> get_stylesheet_directory_uri() . "/vc_templates/ww_shortcode_icon.png",
                "category"	=> "Webworker",
                "params"	=> array(
                    array(
                        "type"			=> "textfield",
                        "heading"		=> "Überschrift",
                        "param_name"	=> "headline",
                        "description"	=> "Geben sie die Überschrift für das Inhaltsverzeichins an. Wenn dieses Feld leer bleibt, lautet die Überschrift standardmäßig 'Inhaltsangabe'."
                    ),
                    array(
                        "type"			=> "textfield",
                        "heading"		=> "bla",
                        "param_name"	=> "bla",
                        "description"	=> "Bla."
                    )
                )
            ));
        }
    }
    new Summary();

} // class exists