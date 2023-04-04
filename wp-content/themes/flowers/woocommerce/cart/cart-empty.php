<?php do_action( 'woocommerce_cart_is_empty' ) ?>

<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
    <section class="section-cart">
        <div class="container">
            <p class="return-to-shop">
                <a class="wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> shop-btn" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                    <?php echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) ) ?>
                </a>
            </p>
        </div>
    </section>
<?php endif ?>