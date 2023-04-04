<?php get_header( '', [ 'title' => get_the_title() ] ) ?>

<?php while ( have_posts() ) : ?>
    <?php the_post() ?>
    <?php wc_get_template_part( 'content', 'single-product' ) ?>
<?php endwhile ?>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>