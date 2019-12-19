<?php
/**
 * Created by PhpStorm.
 * User: hendrikvlaanderen1990
 * Date: 04-03-16
 * Time: 14:42
 */

$cates = get_the_category(get_the_ID());
$cate_name = '';
$cate_slug = '';
foreach ((array)$cates as $cate) {
    if (count($cates) > 0) {
        $cate_name .= $cate->name . ' ';
        $cate_slug .= $cate->slug . ' ';
    }
}

?>
<a href="<?php the_permalink(); ?>">
    <div class="blog-box-3 half-blog-width <?php echo esc_attr($cate_slug); ?>">
        <div class="blog-box-1 grey-section">
            <?php echo gtec_post_thumbnail(); ?>
            <div class="blog-date-1">
                <div class="date-top"><?php the_time('M'); ?></div>
                <div class="date-bottom"><?php the_time('d'); ?></div>
            </div>
            <div class="blog-comm-1"><?php comments_number('0', '1', '%'); ?> <span>&#xf086;</span>
            </div>
            <h6><?php the_title(); ?></h6>
            <p class="show-category"><?php _e('Kategorie', 'bachelorprint'); ?>
                : <?php echo $cate_name; ?></p>
            <p class="show-excerpt"><?php echo clymene_blog_excerpt(25); ?></p>
            <div class="link pull-right"><?php _e('Zum Artikel', 'bachelorprint') ?><i
                    class="fa fa-angle-double-right" style="margin-left:8px;"></i>
            </div>
        </div>
    </div>
</a>