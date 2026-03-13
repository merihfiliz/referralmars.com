<?php get_header(); ?>

<?php if (is_front_page() && !is_paged()) : ?>
<section class="hero-section">
    <h1>Kripto Dunyasina <span class="accent">Mars'tan</span> Bakis</h1>
    <p>En guncel borsa referral kodlari, detayli incelemeler ve baslangic rehberleri ile kripto yolculugunuza avantajli baslayin.</p>
    <a href="#posts" class="hero-cta">&#x1F525; Borsalari Kesfet</a>
</section>
<?php endif; ?>

<div class="site-content" id="posts">
    <main>
        <?php if (!is_front_page() || is_paged()) : ?>
            <h2 class="section-title">Son Yazilar</h2>
        <?php else : ?>
            <h2 class="section-title">&#x1F680; One Cikan Icerikler</h2>
        <?php endif; ?>

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb', array('class' => 'card-thumb')); ?></a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>"><div class="card-thumb" style="display:flex;align-items:center;justify-content:center;font-size:3rem;background:linear-gradient(135deg,#1a1a25,#12121a);">&#x1FA90;</div></a>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php $cats = get_the_category(); if ($cats) : ?>
                                <span class="card-category"><?php echo esc_html($cats[0]->name); ?></span>
                            <?php endif; ?>
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
                            <?php $bonus = get_post_meta(get_the_ID(), '_referral_bonus', true); if ($bonus) : ?>
                                <div style="margin-bottom:12px;">
                                    <span style="display:inline-block;background:linear-gradient(135deg,#ff4500,#ff8c00);color:#fff;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:700;">&#x1F381; <?php echo esc_html($bonus); ?></span>
                                </div>
                            <?php endif; ?>
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
            <div style="text-align:center;padding:60px 20px;">
                <div style="font-size:4rem;margin-bottom:15px;">&#x1FA90;</div>
                <h2>Henuz icerik yok</h2>
                <p style="color:var(--mars-muted);">Yakinda yeni icerikler eklenecek!</p>
            </div>
        <?php endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>