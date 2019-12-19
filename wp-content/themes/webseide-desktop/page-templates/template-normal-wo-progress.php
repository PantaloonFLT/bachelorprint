<?php
/**
 * Template Name: Normal ohne Progress
 */
global $clymene_option;
$page_title = get_post_meta(get_the_ID(),'_cmb_page_title', true);
$sub_text = get_post_meta(get_the_ID(),'_cmb_sub_title', true);
$button_text = get_post_meta(get_the_ID(),'_cm_button_text', true);
$button_link = get_post_meta(get_the_ID(),'_cm_button_url', true);
$icon1 = get_post_meta(get_the_ID(),'_cmb_icon1', true);
$icon1 = get_post_meta(get_the_ID(),'_cmb_icon1', true);
$icon2 = get_post_meta(get_the_ID(),'_cmb_icon2', true);
$icon3 = get_post_meta(get_the_ID(),'_cmb_icon3', true);
$text1 = get_post_meta(get_the_ID(),'_cmb_text1', true);
$text2 = get_post_meta(get_the_ID(),'_cmb_text2', true);
$text3 = get_post_meta(get_the_ID(),'_cmb_text3', true);
$bg = get_post_meta(get_the_ID(),'_cmb_bg_pagehead', true);

get_header(); ?>


<?php if ($bg) { ?>
	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop">
		<?php get_template_part('partials/section', 'page-top'); ?>
	</section>

<?php } ?>
<?php if ( function_exists('yoast_breadcrumb') )
{yoast_breadcrumb('<div id="breadcrumbs" class="container">','</div>');} ?>

<?php while ( have_posts() ) : the_post();

	the_content();

endwhile; ?>

<?php get_footer();