<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-col">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" style="margin-bottom:15px;display:inline-flex;">
                <div class="logo-icon" style="width:32px;height:32px;font-size:16px;">&#x1F680;</div>
                <span class="logo-text" style="font-size:1.1rem;"><?php bloginfo('name'); ?></span>
            </a>
            <p><?php bloginfo('description'); ?></p>
        </div>
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <h4>Hizli Linkler</h4>
                <ul><?php wp_list_pages(array('title_li' => '')); ?></ul>
            <?php endif; ?>
        </div>
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <h4>Kategoriler</h4>
                <ul><?php wp_list_categories(array('title_li' => '', 'show_count' => true)); ?></ul>
            <?php endif; ?>
        </div>
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <h4>Iletisim</h4>
                <p>Kripto borsalarinin en guncel referral kodlari ve bonuslari icin bizi takip edin.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tum haklari saklidir.</span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>