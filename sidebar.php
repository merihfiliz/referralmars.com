<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <div class="widget">
            <h3 class="widget-title">&#x1F50D; Arama</h3>
            <?php get_search_form(); ?>
        </div>
        <div class="widget">
            <h3 class="widget-title">&#x1F4DD; Son Yazilar</h3>
            <ul>
                <?php $recent = new WP_Query(array('posts_per_page' => 5)); ?>
                <?php while ($recent->have_posts()) : $recent->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <div class="widget">
            <h3 class="widget-title">&#x1F4C2; Kategoriler</h3>
            <ul>
                <?php wp_list_categories(array('title_li' => '', 'show_count' => true)); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>