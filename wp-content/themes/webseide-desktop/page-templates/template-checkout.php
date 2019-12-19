<?php
/**
 * Template Name: Checkout Width
 */
  global $clymene_option;
 $page_title = get_post_meta(get_the_ID(),'_cmb_page_title', true);
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
	
	<?php if($bg) { ?>
	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
		<?php
 
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		 
		if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
		<?php $images = rwmb_meta( '_cmb_bg_pagehead', "type=image_advanced" ); ?>
	    <?php if($images) {                                                  
	    foreach ( $images as $image ) {
	    $bg = $image['full_url']; ?>
		<div class="parallax-blog-2" <?php if($bg) { ?>style="background-image: url(<?php echo esc_url($bg); ?>);"<?php } ?>></div>
		<?php } }else{ ?>
		<div class="parallax-blog-2"></div><?php } }else{ ?><div class="parallax-blog-2"></div><?php } ?>
	
		<div class="container">
			<?php if($text1 != '' || $text2 != '' || $text3 != '') { ?>
			<div class="six columns">
				<h1>
					<?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?>
				</h1>
			</div>
			
			<div class="six columns">
				<div id="owl-top-page-slider" class="owl-carousel owl-theme">
					<div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text1); ?>
						</div>
					</div>
					<div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text2); ?>
						</div>
					</div><div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text3); ?>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="col-md-12">
				<h1 class="center main-heading">
					<p><?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?></p>
					<?php if($button_link) {?><a class="ic-btn" href="<?php if($button_link) { htmlspecialchars_decode($button_link); } ?>"><?php if($button_text) { echo htmlspecialchars_decode($button_text); } ?><span class="lnr lnr-chevron-right"></span></a><?php } ?>
				</h1>
			</div>	
			<?php } ?>
		</div>
	</section>
	<?php }elseif ((wpmd_is_notphone()) == true ) { ?>
	<div class="section-home-padding-top"></div>
	<?php } ?>		
	
	<?php while ( have_posts() ) : the_post(); 

		the_content();
				
	endwhile; ?>

<?php get_footer();