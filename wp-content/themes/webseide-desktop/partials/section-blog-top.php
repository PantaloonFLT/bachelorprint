<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 04-03-16
 * Time: 14:36
 */

$facebook_url = get_option('wc_settings_tab_facebook_url');
$youtube_url = get_option('wc_settings_tab_youtube_url');
$instagram_url = get_option('wc_settings_tab_instagram_url');
$page_id = get_option('page_for_posts');
$page_title = get_post_meta($page_id, '_cmb_page_title', true);
$title = get_the_title($page_id);
$text_color = get_post_meta(get_the_ID(), '_cmb_pages_text_color', true);
$text_shadow = get_post_meta(get_the_ID(), '_cmb_pages_text_shadow', true);

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('meta-box/meta-box.php')) { ?>
    <?php $images = rwmb_meta('_cmb_bg_pagehead', "type=image_advanced"); ?>
    <?php if ($images) {
        foreach ($images as $image) {
            $bg = $image['full_url']; ?>
            <div class="parallax-blog-2"
                 <?php if ($bg) { ?>style="background-image: url(<?php echo esc_url($bg); ?>);"<?php } ?>>

            </div>
        <?php }
    } else { ?>
        <div class="parallax-blog-2"></div><?php }
} else { ?>
    <div class="parallax-blog-2"></div><?php } ?>

<div class="container">

    <div class="col-md-8 blog-heading">
        <p style="color:<?php echo $text_color; ?>" class="blog-header-title <?php echo $text_shadow; ?>"><?php echo $title; ?></p>
        <p style="color:<?php echo $text_color; ?>" class="blog-header-sub-title <?php echo $text_shadow; ?>">
            <?php if ($page_title) {
                echo htmlspecialchars_decode($page_title);
            } ?>
        </p>
    </div>

    <div class="col-md-4">
        <div class="social-buttons">
            <a class="fa fa-facebook" href="<?php echo $facebook_url; ?>"></a>
            <a class="fa instagram" style="background-image: url('https://www.bachelorprint.de//wp-content/uploads/2016/07/old-instagram_70x70.png')" href="<?php echo $instagram_url; ?>"></a>
        </div>
    </div>
</div>