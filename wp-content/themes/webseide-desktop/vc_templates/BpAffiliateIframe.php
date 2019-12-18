<?php
/**
 * @var \Gigatec\BpTheme\VisualComposerElements\BpAffiliateIframe $this
 * @var array $atts
 * @var string $content
 * @var string $link_url
 */
$atts = vc_map_get_attributes($this::getShortcodeName(), $atts);
extract($atts);

try {
    $link_url = htmlspecialchars_decode($link_url);
    $urlElements = parse_url($link_url);

    parse_str($urlElements[ 'query' ], $linkParams);
    $urlElements[ 'query' ] = http_build_query($linkParams);
    $url = http_build_url($urlElements);
} catch (\Exception $e) {
    $url = $link_url;
}
if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    return '<!-- iframe URL not Valid! -->';
}
?>

<div class='bp-shop-iframe'>
    <iframe id='iFrameAffiliate' src="<?= $url ?>" style='height:2500px;width: 100%;' scrolling='no'></iframe>
</div>