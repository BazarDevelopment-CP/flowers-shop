<?php
global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ) ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		
        <?php do_action( 'woocommerce_before_add_to_cart_button' ) ?>

		<?php do_action( 'woocommerce_before_add_to_cart_quantity' ) ?>
       
        <div class="options-btn quantity">
                
                <p class="amount">
                    <?php echo isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity() ?>
                </p>
                <div class="plus change-quantity"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Plus.svg" alt="" /></div>
                <div class="minus change-quantity"><img src="<?php echo get_template_directory_uri() ?>/assets/img/minus.svg" alt="" /></div>
            
                <?php
                do_action( 'woocommerce_before_add_to_cart_quantity' );

                woocommerce_quantity_input(
                    [
                        'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                        'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
                        'classes' => [ 'd-none', 'input-quantity', ],
                    ]
                );
                ?>  

        </div>

        <?php  do_action( 'woocommerce_after_add_to_cart_quantity' ) ?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ) ?>" class="options-btn btn single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) ?>">
            <?php echo esc_html( $product->single_add_to_cart_text() ) ?>
        </button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ) ?>
	
    </form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ) ?>

<?php endif ?>