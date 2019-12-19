	<?php
    $protocol = strtolower( substr( $_SERVER["SERVER_PROTOCOL"], 0, 5 ) ) == 'https' ? 'https://' : 'http://';
    if( $_SERVER["SERVER_PORT"] == 443 ) {
        $protocol = 'https://';
    }
    elseif ( isset( $_SERVER['HTTPS'] ) && ( ( $_SERVER['HTTPS'] == 'on' ) || ( $_SERVER['HTTPS'] == '1' ) ) ) {
        $protocol = 'https://';
    }
    elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty( $_SERVER['HTTP_X_FORWARDED_SSL'] ) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on' ) {
        $protocol = 'https://';
    }

	$uri = parse_url( htmlspecialchars( strip_tags( $_SERVER['REQUEST_URI'] ) ) );
	$uri = $uri['path'];
	$site_uri = $protocol.$_SERVER['HTTP_HOST'].$uri;

	//header without elem shop
	$links_without_shop = carbon_get_theme_option( 'crb_relative_links_without_el_shop' );
	function is_without_elem_shop( $site_uri, $links_without_shop ){
		foreach( $links_without_shop as $link ) {
			if( strpos( $site_uri, $link['crb_link'] ) !== false ) {
				return true;
			}
		}
		return false;
	}

	//get sticky navigation
	$links_custom_sticky = carbon_get_theme_option( 'crb_relative_links' );
	function get_sticky_navigation( $site_uri, $links_custom_sticky ) {
		foreach( $links_custom_sticky as $link ) {
			if( strpos( $site_uri, $link['crb_link'] ) !== false ) {
				$sticky_navigation = $link['crb_sticky_'.ICL_LANGUAGE_CODE];
				return $sticky_navigation;
			}
		}
		return false;
	}

	$sticky_navigation = wpautop( get_sticky_navigation( $site_uri, $links_custom_sticky ) );

	//the widget
	function bp_the_widget( $index ) {
		$widget = ob_start();
		dynamic_sidebar( $index.'_'.ICL_LANGUAGE_CODE );
	    $widget = ob_get_clean();
	    if( $widget == true ) {
	    	echo $widget;
	    } else {
	    	dynamic_sidebar( $index );
	    }
	}
	?>


	<?php #global $clymene_option; ?>

		<!-- div class="header-top bp-header-top">
			<div class="gtec-top-bar-wrapper bp-top-bar">
				<div class="container">
					<div class="row">
						<div class="col-md-12 gtec-text-center">
							<div class="row">
								<div class="col-md-4 col-sm-4 bp-top-bar-left">
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
								</div>

								<div class="col-md-4 col-sm-5 bp-top-bar-center">
									<?php
									$phone = bp_get_phone();
									if( $phone ) { ?>
									<div class="bp-cont-tel">
										<?php
										if( !is_without_elem_shop( $site_uri, $links_without_shop ) ) {
										?>
											<span class="lnr lnr-phone-handset"></span>
											<?php _e( "Free advice", "bachelorprint" ); ?>
											<a href="#">
												<?php echo $phone; ?>
											</a>
										<?php } ?>
									</div>
									<?php } ?>
								</div>

								<div class="col-md-4 col-sm-3 bp-top-bar-right">
									<span class="gtec-language-switch-wrapper bp-custom-lang">
			                        	<?php echo bp_get_lang(); ?>
			                        </span>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div  -->
			<header id="bp-header" class="cd-logo-header bp-logo-header">
				<div class="container header-container">
					<div class="row">
						<div class="col-md-2 col-sm-5 bp-logo">
							<a class="cd-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(home_url()) . '/wp-content/uploads/2017/04/BachelorPrint-Logo-1.png'; ?>" alt=""></a>
						</div >

						<?php
						//shop sticky
						$all_links_shop_sticky = array();
						$links_shop_sticky = carbon_get_theme_option( 'crb_relative_links_shop' );
						foreach( $links_shop_sticky as $link ) {
							array_push( $all_links_shop_sticky, $link['crb_link'] );
						}
						if( is_without_elem_shop( $site_uri, $links_without_shop ) ) { ?>
			                <?php #<div class="col-md-6"></div>?>
		                    <div class="col-md-10 col-sm-7 bp-sticky-elem">
		                    	<?php echo $sticky_navigation; ?>
		                    </div>
						<?php } else if( $sticky_navigation ) { ?>
		                    <div id="shop-time-elem" class="col-md-6 bp-sticky-time"></div>
			                <div id="shop-main-panel" class="col-md-4 col-sm-7"></div>
			                <div class="col-md-10 col-sm-7 bp-sticky-elem">
			                    <?php echo $sticky_navigation; ?>
			                </div>
		                <?php } else if( in_array( $uri, $all_links_shop_sticky ) ) { ?>
		                	<div id="shop-time-elem" class="col-md-6"></div>
		                    <div id="shop-main-panel" class="col-md-4 col-sm-7"></div>
		                    <div class="col-md-4 col-sm-7 bp-sticky-elem">
		                    	<div class="row">
		                    		<div class="col-sm-7 bp-sticky-button"></div>
									<div class="col-sm-5 bp-sticky-image">
										<?php bp_the_widget( 'blog_sticky_nav_image' ); ?>
									</div>
		                    	</div>
		                    </div>
						<?php } else { ?>
							<div id="shop-time-elem" class="col-md-6"></div>
		                    <div id="shop-main-panel" class="col-md-4 col-sm-7"></div>
		                    <div class="col-md-4 col-sm-7 bp-sticky-elem">
		                    	<div class="row">
		                    		<div class="col-sm-7 bp-sticky-button">
										<?php bp_the_widget( 'blog_sticky_nav_content' ); ?>
									</div>
									<div class="col-sm-5 bp-sticky-image">
										<?php bp_the_widget( 'blog_sticky_nav_image' ); ?>
									</div>
		                    	</div>
		                    </div>
						<?php } ?>
					</div>
				</div>

				<?php
				$class_menu = in_array( $uri, $all_links_shop_sticky ) ? 'bp-menu-shop' : '';
				?>
				<div class="bp-main-menu <?php echo $class_menu; ?>">
					<div class="container ">
						<div class="row">
							<nav class="bp-main-nav">
								<?php
								$primarymenu = array(
									'theme_location' => 'primary',
									'menu' => '',
									'container' => '',
									'container_class' => '',
									'container_id' => '',
									'menu_class' => 'bp-primary-nav',
									'menu_id' => 'cd-primary-nav',
									'echo' => false,
									'fallback_cb' => 'Bp_Mega_Menu::fallback',
									'walker' => new Bp_Mega_Menu(),
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s"><li class="gtec-home '. (is_front_page() ? "current-menu-item":"") .'"><a href="' . home_url() . '"><span class="bp-home-lnr lnr lnr-home"></span></a></li>%3$s</ul>',
									'depth' => 0,
								);

								if ( has_nav_menu('primary') ) {
									#$menu_thumbnail = carbon_get_theme_option( 'crb_menu_thumbnail' );
									$bp_mega_menu = wp_nav_menu( $primarymenu );
									echo $bp_mega_menu;
									#$obj_mega_menu = phpQuery::newDocument( $bp_mega_menu );
									#$li_elements = $obj_mega_menu->find( ".bp-primary-nav > li.menu-item-has-children" );
									#$count_li = count( $li_elements );
									#for( $i = 0; $i < $count_li; $i++ ) {
										#$li_dropdown_elements = $obj_mega_menu->find( ".bp-primary-nav > li.menu-item-has-children:eq(".$i.") > ul > li" );
										#$count_dropdown_li = count( $li_dropdown_elements );
										#$obj_mega_menu->find( ".bp-primary-nav > li.menu-item-has-children:eq(".$i.") > ul > li" )->wrapAll( "<div class='container'>" );
									#}
									#print $obj_mega_menu;
								}

								?>
								<div id="cd-search" class="cd-search">
									<form action="<?php echo esc_url(home_url('/')); ?>">
										<input type="search" name="s" placeholder="<?php _e('Search...', 'bachelorprint'); ?>">
									</form>
								</div>
							</nav>
							<div class="bp-header-search">
								<span class="bp-search-button"></span>
							</div>
							<div class="bp-search-form">
								<div class="container bp-cont-form">
									<form role="search" method="get" id="" class="bp-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Enter the keyword...', 'bachelorprint'); ?>">
									</form>
									<span class="lnr lnr-cross bp-button-close"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>

		<!-- div id="bp-mobile-nav" class="bp-mobile-nav">
			<?php
			/*
			$menu_args = array(
				'theme_location' => 'bp_mob_nav',
				'menu_class'     => 'bp-mobile-menu',
				'container'      => false,
				'fallback_cb'    => false,
				'link_before'    => '<span class="text-wrap">',
				'link_after'     => '</span>',
				'walker'         => new Bp_Mobile_Menu(),
				'echo'			 => 0,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li class="bp-mob-search">'.bp_get_block_contacts( bp_get_phone() ).'</li></ul>',
			);
			echo wp_nav_menu( $menu_args );
			*/
			?>
		</div  -->