<div class="cart-total cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : '' ?>">
    
    <?php do_action( 'woocommerce_before_cart_totals' ) ?>

    <ul class="total-list">
        
        <li class="total-item">
            <div class="subtotal">
                <p><?php _e( 'Subtotal:', 'woocommerce'  ) ?></p>
                <span><?php wc_cart_totals_subtotal_html() ?></span>
            </div>
        </li>

        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_cart_totals_before_shipping' ) ?>
            
            <li class="total-item ">
                <?php wc_cart_totals_shipping_html() ?>
            </li>

            <?php do_action( 'woocommerce_cart_totals_after_shipping' ) ?>

        <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

            <li class="total-item ">
                <div class="subtotal shipping">
                    <p><?php esc_html_e( 'Shipping', 'woocommerce' ) ?></p>
                    <?php woocommerce_shipping_calculator() ?>
                </div>
            </li>

        <?php endif ?>

    </ul>
   
    <?php do_action( 'woocommerce_cart_totals_before_order_total' ) ?>

    <div class="total-sum">
        <div class="subtotal">
            <p class=""><?php _e( 'Total:', 'woocommerce' ) ?></p>
            <span><?php wc_cart_totals_order_total_html() ?></span>
        </div>
    </div>

    <?php do_action( 'woocommerce_cart_totals_after_order_total' ) ?>
    
    <?php do_action( 'woocommerce_proceed_to_checkout' ) ?>

    <?php do_action( 'woocommerce_after_cart_totals' ) ?>

</div>