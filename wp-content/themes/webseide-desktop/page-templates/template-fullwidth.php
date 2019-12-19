<?php
/**
 * Template Name: Full Width
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

$format = array('Formatieren', 'Verfassen');
$plagiat = array('plagiatspruefung');
$lektorat = array('lektorat-bachelorarbeit');
$format_check = array('format-checks');
$drucken = array('studienarbeiten', 'bindungen', '24h-online-shop');

$r = $_SERVER['REQUEST_URI'];
$r = explode('/', $r);
$r = array_filter($r);
$category = array_merge($r, array());
if (empty($category[1])) {
	$category[1] = '';
}

get_header(); ?>

	<?php if($bg) { ?>
	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop">
		<?php get_template_part('partials/section', 'page-top'); ?>
	</section>
	<?php if (gtec_show_progressbar()): ?>
	<div class="section">
		<div class="container">
			<div id="customNav" class="gtec-progress-bar">
				<p>Dein Fortschritt im BachelorPrint Full-Service: </p>
				<ul style="list-style-type: none;">
					<li> <a class="" href="/wissensmagazin/">1. Tipps zum Schreiben</a></li>
					<li> <a class="<?php echo (in_array($category[0], $plagiat) ? 'activeBreadcrumb' : '' ) ?>" href="/plagiatspruefung/">2. Plagiatsprüfung</a></li>
					<li> <a class="<?php echo (in_array($category[0], $lektorat) && ! in_array($category[1], $format_check) ? 'activeBreadcrumb' : '' ) ?>" href="/lektorat-korrekturlesen/">3. Lektorat & Korrektur</a></li>
					<li> <a class="<?php echo (in_array($category[1], $format_check) ? 'activeBreadcrumb' : '' ) ?>" href="/lektorat-bachelorarbeit/format-checks/">4. Format-Check</a></li>
					<li> <a class="<?php echo (in_array($category[0], $drucken) ? 'activeBreadcrumb' : '' ) ?>" href="/24h-online-shop/">5. Drucken & Binden</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php endif ?>
	<?php } ?>


<?php if ( function_exists('yoast_breadcrumb') )
{yoast_breadcrumb('<div id="breadcrumbs" class="container">','</div>');} ?>

	<?php while ( have_posts() ) : the_post();

		the_content();

	endwhile; ?>

<?php get_footer();