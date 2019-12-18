<?php
/**
 * @var \Gigatec\BpTheme\VisualComposerElements\BpShopIframe $this
 * @var array $atts
 * @var string $content
 * @var string $link_url
 */
$atts = vc_map_get_attributes($this::getShortcodeName(), $atts);
extract($atts);

/*try {
    $link_url = htmlspecialchars_decode($link_url);
    $urlElements = parse_url($link_url);

    parse_str($urlElements[ 'query' ], $linkParams);
    $urlElements[ 'path' ] = "/" . ICL_LANGUAGE_CODE . $urlElements[ 'path' ];

    if(isset($_COOKIE["partner"])) {
        $linkParams["partner"] = $_COOKIE["partner"];
    }

    $urlElements[ 'query' ] = http_build_query($linkParams);
    $url = http_build_url($urlElements);
} catch (\Exception $e) {
    $url = $link_url;
    custom_logs("Execption: $e");
    custom_logs("Link Parameter: ".$linkParams);
}
if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    return '<!-- iframe URL not Valid! -->';
}*/
$link_url = htmlspecialchars_decode($link_url);
?>
<div id="iFrameLoader" class="sk-circle">
    <div class="sk-circle1 sk-child"></div>
    <div class="sk-circle2 sk-child"></div>
    <div class="sk-circle3 sk-child"></div>
    <div class="sk-circle4 sk-child"></div>
    <div class="sk-circle5 sk-child"></div>
    <div class="sk-circle6 sk-child"></div>
    <div class="sk-circle7 sk-child"></div>
    <div class="sk-circle8 sk-child"></div>
    <div class="sk-circle9 sk-child"></div>
    <div class="sk-circle10 sk-child"></div>
    <div class="sk-circle11 sk-child"></div>
    <div class="sk-circle12 sk-child"></div>
</div>
<div class='bp-shop-iframe'>
    <iframe id='iFrameShop' src="<?= $link_url ?>" style='height:2500px;width: 100%;' scrolling='no'></iframe>
</div>