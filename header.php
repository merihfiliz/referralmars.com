<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <div class="logo-icon">&#x1F680;</div>
            <span class="logo-text"><?php bloginfo('name'); ?></span>
        </a>
        <button class="mobile-toggle" aria-label="Menu">&#9776;</button>
        <nav class="main-nav">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'fallback_cb' => function() { echo '<ul><li><a href="' . esc_url(home_url('/')) . '">Ana Sayfa</a></li>'; wp_list_pages(array('title_li' => '')); echo '</ul>'; })); ?>
        </nav>
    </div>
</header>