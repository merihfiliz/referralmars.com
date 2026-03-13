<?php get_header(); ?>

<div class="search-header">
    <h1>&#x1F50D; Arama Sonuclari</h1>
    <p>"<strong><?php echo get_search_query(); ?></strong>" icin <?php echo $wp_query->found_posts; ?> sonuc bulundu</p>
</div>

<div class="site-content">
    <main>
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
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
            <div style="text-align:center;padding:60px;">
                <div style="font-size:4rem;margin-bottom:15px;">&#x1F6F8;</div>
                <h2>Sonuc Bulunamadi</h2>
                <p style="color:var(--mars-muted);">Farkli kelimelerle tekrar deneyin.</p>
                <div style="max-width:400px;margin:20px auto;"><?php get_search_form(); ?></div>
            </div>
        <?php endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>