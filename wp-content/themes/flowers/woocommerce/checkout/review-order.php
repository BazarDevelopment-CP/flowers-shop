<li class="step-item shop_table woocommerce-checkout-review-order-table">
    <div class="step-top " id="step-3">
        <p class="step-num">3</p>
        <h2 class="section-title"><?php echo carbon_get_post_meta( wc_get_page_id( 'checkout' ), 'checkout_shipping_title' ) ?></h2>
    </div>

    <div class="step-body">

        <p class="text">
            <?php echo carbon_get_post_meta( wc_get_page_id( 'checkout' ), 'checkout_shipping_subtitle' ) ?>
        </p>

        <div class="cart-subtotal">
            <div><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
            <div><?php wc_cart_totals_subtotal_html(); ?></div>
        </div>

        <?php //if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php
            $zip = WC()->checkout->get_checkout_fields( 'billing' )[ 'billing_postcode' ];
            woocommerce_form_field( 'billing_postcode', $zip, WC()->checkout->get_value( 'billing_postcode' ) );
            ?>

            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

        <?php //endif; ?>

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <div class="order-total">
            <div><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
            <div><?php wc_cart_totals_order_total_html(); ?></div>
        </div>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

        <a href="#step-4" class="btn" ><?php _e( 'Next', 'woocommerce' ) ?></a>

    </div>

</li>