<?php
$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';
?>

<div class="subtotal shipping">

    
    <p><?php echo wp_kses_post( $package_name ) ?></p>
    
    <?php if ( $available_methods ) : ?>
        
        <ul id="shipping_method" class="woocommerce-shipping-methods">
            <?php foreach ( $available_methods as $method ): ?>
                <li class="radiobuttons-item">
                    <?php
                    if ( 1 < count( $available_methods ) ) {
                        printf( '  <input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s /> ', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); 
                    } else {
                        printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); 
                    }
                    
                    printf( '<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr( sanitize_title( $method->id ) ), wc_cart_totals_shipping_method_label( $method ) );
                    
                    do_action( 'woocommerce_after_shipping_rate', $method, $index );
                    ?>
                </li>
            <?php endforeach ?>
        </ul>
        
    <?php
    $calculator_text = esc_html__( 'Change ZIP', 'woocommerce' );

    elseif ( ! $has_calculated_shipping || ! $formatted_destination ) :
        if ( is_cart() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ) ) {
            echo wp_kses_post( apply_filters( 'woocommerce_shipping_not_enabled_on_cart_html', __( 'Shipping costs are calculated during checkout.', 'woocommerce' ) ) );
        } else {
            echo wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( 'Enter your address to view shipping options.', 'woocommerce' ) ) );
        }
    elseif ( ! is_cart() ) :
        echo wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) );
    else :
        esc_html_e( 'No shipping options were found.', 'woocommerce' );
        $calculator_text = esc_html__( 'Enter a different Change ZIP', 'woocommerce' );
    endif;
    ?>

    <?php if ( $show_shipping_calculator ) : ?>
        <?php woocommerce_shipping_calculator( $calculator_text ) ?>
    <?php endif ?>

</div>