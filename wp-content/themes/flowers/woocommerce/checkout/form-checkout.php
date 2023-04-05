<?php
do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <?php if ( $checkout->get_checkout_fields() ) : ?>

        <?php do_action( 'woocommerce_checkout_before_customer_details' ) ?>

        <li class="step-item">
            
            <div class="step-top">
                <p class="step-num">1</p>
                <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'checkout_contacts_title' ) ?></h2>
            </div>
            
            <div class="step-body">
                
                <p class="text">
                    <?php echo carbon_get_the_post_meta( 'checkout_contacts_subtitle' ) ?>
                </p>
        
                <?php do_action( 'woocommerce_checkout_billing' ) ?>
            
                <?php do_action( 'woocommerce_checkout_shipping' ) ?>

                <a href="#step-2" class="btn" ><?php _e( 'Next', 'woocommerce' ) ?></a>

            </div>

        </li>

        <?php do_action( 'woocommerce_checkout_after_customer_details' ) ?>

    <?php endif ?>

    <li class="step-item" >
            
        <div class="step-top" id="step-2">
            <p class="step-num">2</p>
            <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'checkout_gift_title' ) ?></h2>
        </div>
        
        <div class="step-body">
            
            <p class="text">
                <?php echo carbon_get_the_post_meta( 'checkout_gift_subtitle' ) ?>
            </p>
    
            <?php
            $cats_field = $checkout->get_checkout_fields( 'billing' )[ 'billing_cats' ];
            woocommerce_form_field( 'billing_cats', $cats_field, $checkout->get_value( 'billing_cats' ) );
            ?>

            <?php
            $cats_desc_field = $checkout->get_checkout_fields( 'billing' )[ 'billing_cats_desc' ];
            woocommerce_form_field( 'billing_cats_desc', $cats_desc_field, $checkout->get_value( 'billing_cats_desc' ) );
            ?>

            <a href="#step-3" class="btn" ><?php _e( 'Next', 'woocommerce' ) ?></a>

        </div>

    </li>

    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ) ?>

    <?php do_action( 'woocommerce_checkout_before_order_review' ) ?>

    <?php do_action( 'woocommerce_checkout_order_review' ) ?>

    <?php do_action( 'woocommerce_checkout_after_order_review' ) ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ) ?>