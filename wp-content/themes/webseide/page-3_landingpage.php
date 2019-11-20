<?php
/**
 * Template Name: Landing-Page ohne H1+Menü
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
<link rel="apple-touch-icon shortcut icon" href="<?php echo get_site_icon_url(); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo (get_theme_mod( 'webseide_hamburger_desktop' ) == '1' ? 'show-hamburger-desktop' : ''); ?> <?php echo get_post_type(); ?>">

    <?php if ( is_active_sidebar( 'headstrip' ) ) : ?>
        <div id="headstrip" class="<?php echo ( '' != get_theme_mod( 'webseide_headstrip_alignment' ) ? get_theme_mod( 'webseide_headstrip_alignment') : 'alignright'); ?> <?php echo ( '' != get_theme_mod( 'webseide_headstrip_position' ) ? get_theme_mod( 'webseide_headstrip_position') : 'aboveheader'); ?>" role="complementary">
            <span class="headstrip-inner"><?php dynamic_sidebar( 'headstrip' ); ?></span>
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

            <?php if ( is_active_sidebar( 'header_right' ) ) : ?>
              <div id="header_right" class="primary-sidebar widget-area" role="complementary">
                  <?php dynamic_sidebar( 'header_right' ); ?>
              </div>
          	<?php endif; ?>


        </div><!-- .menus -->

	</header><!-- #masthead -->

    <div id="content" class="site-content">


        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <div class="fullthumbnail">
                            <?php if (get_theme_mod( 'webseide_limitimagewidth' ) == '1'):?>
                                <?php echo get_the_post_thumbnail( $page->ID, 'webseide_large' ); ?>
                            <?php else : ?>
                                <?php the_post_thumbnail(); echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer">
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

                <?php endwhile; // End of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php get_footer(); ?>
