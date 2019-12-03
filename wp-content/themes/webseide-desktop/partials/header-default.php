	<?php global $clymene_option; ?>

	<!-- This is the desktop view of the app -->

	<?php if ((wpmd_is_notphone()) == true) { ?>

		<div class="header-top">
			<div class="gtec-top-bar-wrapper">
				<div class="container">
					<div class="col-md-12 gtec-text-center">
                        <nav class="topnav">
                            <?php
                            $topmenu = array(
                                'theme_location' => 'topnav',
                                'menu' => '',
                                'container' => '',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'cd-top-nav',
                                'menu_id' => 'cd-top-nav',
                                'echo' => true,
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker(),
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'depth' => 0,
                            );
                            if (has_nav_menu('primary')) {
                                wp_nav_menu($topmenu);
                            }
                            ?>
                        </nav>
                        <?php
                        $currentUrl = $_SERVER[ 'REQUEST_URI' ];
                        $arrayUrls = array("/24h-online-shop", "/studienarbeiten", "/bindungen");
                        if(strpos($currentUrl, $arrayUrls[0])!==false or strpos($currentUrl, $arrayUrls[1])!==false or strpos($currentUrl, $arrayUrls[2])!==false) :
                            ?>
                            <span class="gtec-support">
								<?php echo do_shortcode('[textblock code="header-top"]'); ?>
						</span>
                        <?php
                        endif;
                        ?>
                        <span class="gtec-language-switch-wrapper"><?php do_action('wpml_add_language_selector'); ?></span>
					</div>
				</div>
			</div>
			<header class="cd-logo-header">
				<div class="container header-container">

					<div class="col-md-4">
						<a class="cd-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(home_url()) . '/wp-content/uploads/2017/04/BachelorPrint-Logo-1.png'; ?>" alt=""></a>
					</div>
                    <div class="col-md-4 delivery" data-ajax="show_delivery_date" data-ajax-lang="<?=ICL_LANGUAGE_CODE?>"></div>

                    <div class="col-md-4 header-cart-icon">
                        <div class="account-hyperlink-icons">

                                <a class="basket-header" href="/warenkorb" title="<?php _e('Zum Warenkorb'); ?>"><i class="icon-cart"></i>
                                    <span class="tooltip"></span>
                                    <span class="basket-text">Warenkorb</span>
                                </a>
                        </div>
                    </div>

				</div>
			</header>

			<nav class="cd-nav">
				<?php
				$primarymenu = array(
					'theme_location' => 'primary',
					'menu' => '',
					'container' => '',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => 'cd-primary-nav',
					'menu_id' => 'cd-primary-nav',
					'echo' => true,
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker(),
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s"><li class="gtec-home '. (is_front_page() ? "current-menu-item":"") .'"><a href="' . home_url() . '"><i class="fa fa-home" aria-hidden="true"></i></a></li>%3$s</ul>',
					'depth' => 0,
				);
				if (has_nav_menu('primary')) {
					wp_nav_menu($primarymenu);
				}
				?>
				<div id="cd-search" class="cd-search">
					<form action="<?php echo esc_url(home_url('/')); ?>">
						<input type="search" name="s" placeholder="<?php _e('Search...', 'clymene'); ?>">
					</form>
				</div>
			</nav>

			<header class="cd-main-header">
				<?php if (!defined('DISABLE_LANGUAGE_CONTENT')) {?>
				<div class="gtec-sticky-header">
					<div class="container">
						<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 gtec-sticky-logo">
							<div>
								<a class="cd-logo" href="<?php echo esc_url(home_url('/')); ?>"><img
										src="<?php echo esc_url($clymene_option['logo']['url']); ?>" alt=""></a>
							</div>
						</div>
						<div class="hidden-xs col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
						<div class="col-lg-3 gtec-sticky-text visible-lg">
							<div>
								<p><?php _e('Studienarbeit bequem online drucken.', 'bachelorprint'); ?></p>
							</div>
						</div>
						<div class="col-xs-8 col-sm-4 col-md-5 col-lg-3 gtec-sticky-button"><?php dynamic_sidebar('blog_sticky_nav_content'); ?></div>
						<div class="hidden-xs col-lg-1 visible-lg"></div>
						<div class="hidden-xs col-xs-4 col-sm-3 col-md-3 col-lg-2 gtec-sticky-image">
							<div><?php dynamic_sidebar('blog_sticky_nav_image'); ?></div>
						</div>
					</div>
				</div>
				<?php } else {
					echo do_shortcode('[textblock id="36668"]');
				} ?>
				<div class="container">
					<ul class="cd-header-buttons">
						<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
						<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
					</ul>
					<!-- cd-header-buttons -->
				</div>
			</header>


		</div>

		<!-- This is the mobile view of the app -->

	<?php } else { ?>

		<div class="header-top">
			<div class="gtec-top-bar-wrapper">
					<div class="">
						<span class="gtec-support">
								<?php echo do_shortcode('[textblock code="header-top"]'); ?>
						</span>
						<span class="gtec-language-switch-wrapper"><?php do_action('wpml_add_language_selector'); ?></span>
					</div>
				</div>
			</div>
			<header class="cd-logo-header">
				<div class="container header-container">

					<div class="row">
						<div class="col-xs-8 col-xs-offset-1 mobile-header-img">
							<a class="cd-logo" href="<?php echo esc_url(home_url('/')); ?>"><img
									src="<?php echo esc_url($clymene_option['logo']['url']); ?>" alt=""></a>
						</div>
					</div>
					<!-- hide header icons in mobile view -->
					<!--<div class="row header-icons">
						<div class="col-xs-6 col-xs-offset-3">
							<?php /*echo do_shortcode('[show_phone]'); */?>
						</div>
					</div>
					<div class="row header-icons">
						<div class="col-xs-6 header-cart-icon">
							<a class="basket-header" href="<?php /*echo WC()->cart->get_cart_url(); */?>" title="<?php /*_e('Zum Warenkorb'); */?>">
								<i class="icon-cart"></i>
								<span class="tooltip">
									<?php /*$cart_count = WC()->cart->get_cart_contents_count();
									if ($cart_count > 0) { echo $cart_count; } */?>
								</span>
								<span class="basket-text">Warenkorb</span>
							</a>
						</div>
						<div class="col-xs-6 header-cart-icon header-icons">
							<a class="account-header" href="<?php /*echo get_permalink(get_option('woocommerce_myaccount_page_id')); */?>" title="Zum Konto">
								<i class="lnr lnr-user"></i>
								<span class="account-text">Mein Konto</span>
							</a>
						</div>
					</div>
					<div class="col-xs-12 delivery">
						<?php /*echo do_shortcode('[show_delivery_date]'); */?>
					</div>-->
				</div>
			</header>

			<header class="cd-main-header">
				<div class="container">
					<ul class="cd-header-buttons">
						<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
						<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
					</ul>
					<!-- cd-header-buttons -->
				</div>
			</header>

			<nav class="cd-nav">
				<?php
				$primarymenu = array(
					'theme_location' => 'primary',
					'menu' => '',
					'container' => '',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => 'cd-primary-nav',
					'menu_id' => 'cd-primary-nav',
					'echo' => true,
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
					'walker' => new wp_bootstrap_navwalker(),
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
					'depth' => 0,
				);
				if (has_nav_menu('primary')) {
					wp_nav_menu($primarymenu);
				}
				?>
				<div id="cd-search" class="cd-search">
					<form action="<?php echo esc_url(home_url('/')); ?>">
						<input type="search" name="s" placeholder="<?php _e('Suche...', 'clymene'); ?>">
					</form>
				</div>
			</nav>

		</div>

	<?php }; ?>

	<!-- End of Different Views -->