<footer class="footer">
    <div class="container">
        <div class="footer-left">
            <div class="footer-logo">
                <h2 class="section-title"><?php bloginfo( 'name' ) ?></h2>
            </div>
            <ul class="footer-contacts">
                <li class="breadcrumbs"></li>
                <li><?php _e( 'Phone' ) ?> <a href="tel:<?php echo carbon_get_theme_option( 'flowers_phones' )[0][ 'number' ] ?>"><?php echo carbon_get_theme_option( 'flowers_phones' )[0][ 'number' ] ?></a></li>
                <li><?php _e( 'Email' ) ?> <a href="mailto:<?php echo carbon_get_theme_option( 'flowers_email' ) ?>"><?php echo carbon_get_theme_option( 'flowers_email' ) ?></a></li>
                <li><?php _e( 'Adress' ) ?> <a><?php echo carbon_get_theme_option( 'flowers_address' ) ?></a></li>
            </ul>
            <ul class="footer-nav">
                <li class="footer-nav-item">
                    <a href="<?php the_permalink( wc_get_page_id( 'cart' ) ) ?>"><?php _e( 'Cart' ) ?></a>
                </li>
                <li class="footer-nav-item">
                    <a href="<?php the_permalink( wc_get_page_id( 'checkout' ) ) ?>"><?php _e( 'Checkout' ) ?></a>
                </li>
            </ul>

            <?php get_template_part( 'parts/follow-us' ) ?>

        </div>
        <div class="footer-right">
            <iframe src="<?php echo carbon_get_post_meta( get_option( 'page_on_front' ), 'home_footer_map' ) ?>"
                width="100%" height="267px" style="border: 0; border-radius: 16px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

</body>

</html>