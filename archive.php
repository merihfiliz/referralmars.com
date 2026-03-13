<?php get_header(); ?>

<div class="archive-header">
    <h1><?php the_archive_title(); ?></h1>
    <?php the_archive_description('<p class="desc">', '</p>'); ?>
</div>

<div class="site-content">
    <main>
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb', array('class' => 'card-thumb')); ?></a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>"><div class="card-thumb" style="display:flex;align-items:center;justify-content:center;font-size:3rem;">&#x1FA90;</div></a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
                            <div class="card-meta">
                                <span>&#x1F4C5; <?php echo get_the_date('d M Y'); ?></span>
                                <a href="<?php the_permalink(); ?>" class="read-more">Devamini Oku &#x2192;</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php referralmars_pagination(); ?>
        <?php else : ?>
            <div style="text-align:center;padding:60px;"><h2>Icerik bulunamadi</h2></div>
        <?php endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>