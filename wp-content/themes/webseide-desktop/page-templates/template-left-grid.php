<?php
/**
 * Template Name: Blog Grid Left Sidebar
 */
global $clymene_option;
get_header(); ?>

    <section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
        <?php get_template_part('partials/section', 'blog-top'); ?>
    </section>

    <section class="section white-section section-padding-top-bottom">

        <div class="container">
            <div class="col-md-3">
                <div class="post-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <div class="col-md-9 remove-top">

                <div class="blog-wrapper">
                    <div id="blog-grid">
                        <?php if (have_posts()) : ?>
                            <?php
                            $args = array(
                                'paged' => $paged,
                                'post_type' => 'post',
                            );
                            $wp_query = new WP_Query($args);
                            while ($wp_query->have_posts()): $wp_query->the_post();

                                get_template_part('partials/section', 'blog-loop');
                            endwhile;
                         else: ?>
                            <h1><?php _e('Nothing Found Here!', 'clymene'); ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php bp_pagination_blog(); ?>
                </div>
        </div>

    </section>

    </main>

<?php get_footer(); ?>