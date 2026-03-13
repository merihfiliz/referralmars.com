<?php
function referralmars_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 450, true);
    add_image_size('card-thumb', 400, 250, true);
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array('height' => 60, 'width' => 200, 'flex-height' => true, 'flex-width' => true));
    register_nav_menus(array('primary' => 'Ana Menu', 'footer' => 'Footer Menu'));
}
add_action('after_setup_theme', 'referralmars_setup');

function referralmars_scripts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('referralmars-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'referralmars_scripts');

function referralmars_widgets() {
    register_sidebar(array('name' => 'Kenar Cubugu', 'id' => 'sidebar-1', 'before_widget' => '<div class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>'));
    register_sidebar(array('name' => 'Footer 1', 'id' => 'footer-1', 'before_widget' => '<div class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => 'Footer 2', 'id' => 'footer-2', 'before_widget' => '<div class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
    register_sidebar(array('name' => 'Footer 3', 'id' => 'footer-3', 'before_widget' => '<div class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4>', 'after_title' => '</h4>'));
}
add_action('widgets_init', 'referralmars_widgets');

function referralmars_excerpt_length($length) { return 25; }
add_filter('excerpt_length', 'referralmars_excerpt_length');
function referralmars_excerpt_more($more) { return '...'; }
add_filter('excerpt_more', 'referralmars_excerpt_more');

function referralmars_pagination() {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
    ));
    if (is_array($pages)) {
        echo '<div class="pagination">';
        foreach ($pages as $page) { echo $page; }
        echo '</div>';
    }
}

function referralmars_add_meta_boxes() {
    add_meta_box('referral_details', 'Referral / Borsa Bilgileri', 'referralmars_meta_box_html', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'referralmars_add_meta_boxes');

function referralmars_meta_box_html($post) {
    wp_nonce_field('referralmars_meta_box', 'referralmars_meta_box_nonce');
    $ref_code = get_post_meta($post->ID, '_referral_code', true);
    $ref_link = get_post_meta($post->ID, '_referral_link', true);
    $ref_bonus = get_post_meta($post->ID, '_referral_bonus', true);
    $exchange_name = get_post_meta($post->ID, '_exchange_name', true);
    ?>
    <table style="width:100%;border-collapse:collapse;">
        <tr><td style="padding:10px;"><label><strong>Borsa Adi:</strong></label></td><td style="padding:10px;"><input type="text" name="exchange_name" value="<?php echo esc_attr($exchange_name); ?>" style="width:100%;padding:8px;" placeholder="Binance, Bybit..."></td></tr>
        <tr><td style="padding:10px;"><label><strong>Referral Kodu:</strong></label></td><td style="padding:10px;"><input type="text" name="referral_code" value="<?php echo esc_attr($ref_code); ?>" style="width:100%;padding:8px;" placeholder="MARS2024"></td></tr>
        <tr><td style="padding:10px;"><label><strong>Referral Linki:</strong></label></td><td style="padding:10px;"><input type="url" name="referral_link" value="<?php echo esc_attr($ref_link); ?>" style="width:100%;padding:8px;" placeholder="https://..."></td></tr>
        <tr><td style="padding:10px;"><label><strong>Bonus Miktari:</strong></label></td><td style="padding:10px;"><input type="text" name="referral_bonus" value="<?php echo esc_attr($ref_bonus); ?>" style="width:100%;padding:8px;" placeholder="%20 Indirim"></td></tr>
    </table>
    <?php
}

function referralmars_save_meta($post_id) {
    if (!isset($_POST['referralmars_meta_box_nonce'])) return;
    if (!wp_verify_nonce($_POST['referralmars_meta_box_nonce'], 'referralmars_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    $fields = array('referral_code', 'referral_link', 'referral_bonus', 'exchange_name');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'referralmars_save_meta');

function referralmars_footer_scripts() {
    ?>
    <script>
    function copyRefCode(code) {
        navigator.clipboard.writeText(code).then(function() {
            var btn = event.target;
            var orig = btn.textContent;
            btn.textContent = 'Kopyalandi!';
            btn.style.background = '#22c55e';
            setTimeout(function() { btn.textContent = orig; btn.style.background = ''; }, 2000);
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.querySelector('.mobile-toggle');
        var nav = document.querySelector('.main-nav');
        if (toggle && nav) {
            toggle.addEventListener('click', function() { nav.classList.toggle('active'); });
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'referralmars_footer_scripts');
?>