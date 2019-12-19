<?php
/**
 * Template Name: Home
 */
global $clymene_option;
$page_title = get_post_meta(get_the_ID(), '_cmb_page_title', true);
$button_text = get_post_meta(get_the_ID(), '_cm_button_text', true);
$button_link = get_post_meta(get_the_ID(), '_cm_button_url', true);
$icon1 = get_post_meta(get_the_ID(), '_cmb_icon1', true);
$icon1 = get_post_meta(get_the_ID(), '_cmb_icon1', true);
$icon2 = get_post_meta(get_the_ID(), '_cmb_icon2', true);
$icon3 = get_post_meta(get_the_ID(), '_cmb_icon3', true);
$text1 = get_post_meta(get_the_ID(), '_cmb_text1', true);
$text2 = get_post_meta(get_the_ID(), '_cmb_text2', true);
$text3 = get_post_meta(get_the_ID(), '_cmb_text3', true);
$bg = get_post_meta(get_the_ID(), '_cmb_bg_pagehead', true);
get_header(); ?>

<?php if (false) { ?>
    <section id="bach-home-slider" class="vc_rows wpb_rows vc_rows-fluid" style="height:auto;padding:0;">
        <?php echo do_shortcode('[textblock code="home-slider"]'); ?>
    </section>
<?php } ?>

<?php if (gtec_show_progressbar()): ?>
<div class="container">
	<div id="customNav" class="gtec-progress-bar">
		<p>Dein Fortschritt im BachelorPrint Full-Service: </p>
		<ul style="list-style-type: none;">
			<li> <a class="" href="/wissensmagazin/">1. Tipps zum Schreiben</a></li>
			<li> <a class="" href="/plagiatspruefung/">2. Plagiatsprüfung</a></li>
			<li> <a class="" href="/lektorat-korrekturlesen/">3. Lektorat & Korrektur</a></li>
			<li> <a class="" href="/lektorat-bachelorarbeit/format-checks/">4. Format-Check</a></li>
			<li> <a class="" href="/24h-online-shop/">5. Drucken & Binden</a></li>
		</ul>
	</div>
</div>

<?php endif ?>

<?php while (have_posts()) : the_post();
    the_content();
	//echo '<div id="bachelorprint-ajax-get-content"></div>';//get ajax content
endwhile; ?>

<?php get_footer();

