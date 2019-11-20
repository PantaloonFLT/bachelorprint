<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webseide
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="thumbnail" content="<?php if(has_post_thumbnail()){ echo get_the_post_thumbnail_url(@$post_id, 'thumbnail'); } else {echo get_theme_mod( 'webseide_logo' );}?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo (get_theme_mod( 'webseide_hamburger_desktop' ) == '1' ? 'show-hamburger-desktop' : ''); ?> <?php echo get_post_type(); ?>">

    <?php if ( is_active_sidebar( 'headstrip' ) ) : ?>
        <div id="headstrip" class="<?php echo ( '' != get_theme_mod( 'webseide_headstrip_alignment' ) ? get_theme_mod( 'webseide_headstrip_alignment') : 'alignright'); ?> <?php echo ( '' != get_theme_mod( 'webseide_headstrip_position' ) ? get_theme_mod( 'webseide_headstrip_position') : 'aboveheader'); ?>" role="complementary">
            <div class="headstrip-inner"><?php dynamic_sidebar( 'headstrip' ); ?></div>
        </div>
    <?php endif; ?>

	<header id="masthead" class="site-header <?php echo get_theme_mod( 'webseide_headerfontstyle' ); ?> <?php echo get_theme_mod( 'webseide_headerfontweight' ); ?> <?php if ( is_active_sidebar( 'headstrip' ) ) { echo 'headstrip'; } ?> <?php echo ( '' != get_theme_mod( 'webseide_headstrip_position' ) ? get_theme_mod( 'webseide_headstrip_position') : 'aboveheader'); ?>" role="banner">

    	<div class="menus">
        	<div id="header-image">
              	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if ( get_theme_mod( 'webseide_logo' ) ) : ?>
						<img src="<?php echo get_theme_mod( 'webseide_logo' ) ; ?>" id="logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php else: ?>
						<span id="page-name"><?php echo bloginfo( 'name' ) ?></span>
					<?php endif; ?>
              	</a>
        	</div>


			<nav id="site-navigation-mobile" class="main-navigation" role="navigation">
				<div id="mobileMenuToggle">

			    	<input type="checkbox" />

			    	<span></span>
			    	<span></span>

			    	<div class="menu-wrapper">
			    		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary_menu' ) ); ?>
			    	</div>

				</div>
			</nav>

            <?php if ( is_active_sidebar( 'header_right' ) ) : ?>
              <div id="header_right" class="primary-sidebar widget-area" role="complementary">
                  <?php dynamic_sidebar( 'header_right' ); ?>
              </div>
          	<?php endif; ?>

			<nav id="site-navigation" class="main-navigation <?php echo ( '' != get_theme_mod( 'webseide_mainmenu_alignment' ) ? get_theme_mod( 'webseide_mainmenu_alignment') : 'menualignright'); ?>" role="navigation">
				  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>



        </div><!-- .menus -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">