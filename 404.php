<?php get_header(); ?>

<div class="error-404">
    <div class="error-code">404</div>
    <h2 style="margin-bottom:15px;">Sayfa Bulunamadi</h2>
    <p style="color:var(--mars-muted);max-width:500px;margin:0 auto 30px;">Aradiginiz sayfa tasinmis veya silinmis olabilir.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="hero-cta">&#x1F680; Ana Sayfaya Don</a>
    <div style="max-width:400px;margin:30px auto 0;"><?php get_search_form(); ?></div>
</div>

<?php get_footer(); ?>