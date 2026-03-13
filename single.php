<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<div class="single-header">
    <?php $cats = get_the_category(); if ($cats) : ?>
        <span class="cat-label"><?php echo esc_html($cats[0]->name); ?></span>
    <?php endif; ?>
    <h1><?php the_title(); ?></h1>
    <div class="post-meta">
        <span>&#x1F4C5; <?php echo get_the_date('d M Y'); ?></span> &bull;
        <span><?php echo get_the_author(); ?></span> &bull;
        <span><?php comments_number('0 Yorum', '1 Yorum', '% Yorum'); ?></span>
    </div>
</div>

<?php if (has_post_thumbnail()) : ?>
    <div style="max-width:900px;margin:0 auto 30px;padding:0 20px;">
        <?php the_post_thumbnail('large', array('style' => 'width:100%;border-radius:16px;')); ?>
    </div>
<?php endif; ?>

<div class="single-content">
    <?php the_content(); ?>

    <?php
    $exchange = get_post_meta(get_the_ID(), '_exchange_name', true);
    $ref_code = get_post_meta(get_the_ID(), '_referral_code', true);
    $ref_link = get_post_meta(get_the_ID(), '_referral_link', true);
    $ref_bonus = get_post_meta(get_the_ID(), '_referral_bonus', true);
    if ($ref_code || $ref_link) : ?>
        <div class="referral-box">
            <?php if ($exchange) : ?>
                <h3>&#x1F680; <?php echo esc_html($exchange); ?> Referral</h3>
            <?php endif; ?>
            <?php if ($ref_bonus) : ?>
                <div class="bonus-badge">&#x1F381; <?php echo esc_html($ref_bonus); ?></div>
            <?php endif; ?>
            <?php if ($ref_code) : ?>
                <div class="ref-code">
                    <code><?php echo esc_html($ref_code); ?></code>
                    <button class="copy-btn" onclick="copyRefCode('<?php echo esc_js($ref_code); ?>')" >Kopyala</button>
                </div>
            <?php endif; ?>
            <?php if ($ref_link) : ?>
                <a href="<?php echo esc_url($ref_link); ?>" target="_blank" rel="nofollow noopener" class="ref-link">&#x1F517; Kayit Ol &amp; Bonus Kazan</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<div class="comments-area">
    <?php if (comments_open() || get_comments_number()) : ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>