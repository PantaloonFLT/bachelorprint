<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 04-03-16
 * Time: 14:49
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('meta-box/meta-box.php')) { ?>
    <?php $images = rwmb_meta('_cmb_bg_pagehead', "type=image_advanced"); ?>
    <?php $subTitle = $slides_text_color = get_post_meta(get_the_ID(), '_cmb_page_title', true); ?>
    <?php $text_color = get_post_meta(get_the_ID(), '_cmb_pages_text_color', true);?>
    <?php $text_shadow = get_post_meta(get_the_ID(), '_cmb_pages_text_shadow', true);

    ?>
    <?php if ($images) {
        foreach ($images as $image) {
            $bg = $image['full_url']; ?>
            <div class="subpage-image"
                 <?php if ($bg) { ?>style="background-image: url(<?php echo esc_url($bg); ?>);"<?php } ?>></div>
        <?php }
    } else { ?>
        <div class="subpage-image"></div><?php }
} else { ?>
    <div class=""></div><?php } ?>

<div class="container">

        <div class="center main-heading">
            <h1 class="<?php echo $text_shadow; ?>" style="color:<?php echo $text_color; ?>"><?php
                the_title();
                ?></h1>
            <h2 class="<?php echo $text_shadow; ?>" style="color:<?php echo $text_color; ?>"><?php echo htmlspecialchars_decode($subTitle); ?></h2>
            <?php if ($button_link) { ?><a class="ic-btn" href="<?php if ($button_link) {
                htmlspecialchars_decode($button_link);
            } ?>"><?php if ($button_text) {
                echo htmlspecialchars_decode($button_text);
            } ?><span class="lnr lnr-chevron-right"></span></a><?php } ?>
        </div>

</div>