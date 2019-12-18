<?php

//Visual Composer BachelorprintIframe Element

if (!class_exists("BachelorprintIframe")) {

    class BachelorprintIframe
    {
        public static $shortcode_name = "bachelorprintiframe";

        /**
         * Summary constructor.
         */
        public function __construct()
        {
            add_shortcode(self::$shortcode_name, [$this, "shortcode"]);
            add_action("vc_before_init", [$this, "vcIntegration"]);
        }

        /**
         * Add Shortcode to Visual Composer
         */
        public function vcIntegration()
        {
            vc_map([
                "name"     => "Topcorrect iFrame",
                "base"     => self::$shortcode_name,
                "icon"     => get_stylesheet_directory_uri() . "/vc_templates/ww_shortcode_icon.png",
                "category" => "Webworker",
                "params"   => [
                    [
                        "type"       => "textfield",
                        "heading"    => esc_html__("Custom CSS Class", 'webworker'),
                        "param_name" => "class",
                        "value"      => "",
                    ],
                    [
                        'type'        => 'textfield',
                        'holder'      => 'p',
                        'class'       => 'title-class',
                        'heading'     => __('URL', 'text-domain'),
                        'param_name'  => 'link_url',
                        'value'       => '',
                        'description' => __('Link, zB /online-shop/', 'text-domain'),
                        'admin_label' => false,
                        'group'       => 'Custom Group',
                    ]
                ]
            ]);
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
            /**
             * @var string $link_url
             */
            extract(shortcode_atts([
                    'link_url' => '',
                ], $atts)
            );
            try {
                $link_url = htmlspecialchars_decode($link_url);
                $urlElements = parse_url($link_url);
                parse_str($urlElements[ 'query' ], $linkParams);
                parse_str($_SERVER[ 'QUERY_STRING' ], $windowParams);
                if(key_exists('u',$windowParams)) {
                    $urlElements[ 'path' ] = trailingslashit($urlElements[ 'path' ]) . $windowParams[ 'u' ];
                    unset($windowParams['u']);
                }
                $newParams = array_replace_recursive($linkParams, $windowParams);
                $urlElements[ 'query' ] = http_build_query($newParams);
                $url = http_build_url($urlElements);
            } catch (\Exception $e) {
                $url = $link_url;
            }
            if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
                return '<!-- iframe URL not Valid! -->';
            }

            return "<div class='bp-iframe'><iframe id='bachelorprint-iframe' src=" . $url . " style='margin: 0; width: 100%; height: 806px; border: none; overflow: hidden;'></iframe></div><script> window.addEventListener('message', function(e) {var scroll_height = e.data; document.getElementById('bachelorprint-iframe').style.height = scroll_height + 'px'; } , false);</script>";
        }
    }

    new BachelorprintIframe();
}