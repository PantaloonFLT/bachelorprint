<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webseide
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php if( get_theme_mod( 'webseide_h1-archives' ) == '0'): ?>
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php endif; ?>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
			</header><!-- .page-header -->
            
            
            <?php if(get_theme_mod('webseide_blogwidgets_archives')==1):?>
                <?php if ( is_active_sidebar( 'above_blog' ) ) : ?>
                    <div id="above_blog" class="primary-sidebar widget-area" role="complementary">
                          <?php dynamic_sidebar( 'above_blog' ); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

			<?php /* Start the Loop */ ?>
			<div class="blog-grid">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>
			</div>
			<?php  the_posts_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
