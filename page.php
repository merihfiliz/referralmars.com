<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<div class="single-header">
    <h1><?php the_title(); ?></h1>
</div>

<div class="single-content">
    <?php the_content(); ?>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>