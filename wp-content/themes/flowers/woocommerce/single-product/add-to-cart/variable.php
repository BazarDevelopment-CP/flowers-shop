<?php
global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ) ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ) ?>" method="POST" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ) ?>" data-product_variations="<?php echo $variations_attr ?>">
	
	<?php do_action( 'woocommerce_before_variations_form' ) ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ) ?></p>
	
	<?php else : ?>
	
		<table class="variations" cellspacing="0" role="presentation">
			<tbody>
				
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>

					<tr>
						<td class="value">
							
							<?php
								wc_dropdown_variation_attribute_options(
									[
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
                                        'class'     => 'd-none',
                                    ]
								);
							?>
                           
                            <div class="options-btn">
                                <?php echo wc_attribute_label( $attribute_name ) ?>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/shop/ExpandArrowBL.svg" alt="arrow" />
                            </div>
                            
                            <ul class="variation-list" data-name="<?php echo 'attribute_' . mb_strtolower( $attribute_name ) ?>">
                                
								<?php foreach ( $options as $option ) : ?>
                                    
									<li class="variation-item" data-value="<?php echo $option ?>">
                                        <?php echo get_term_by( 'slug', $option, $attribute_name )->name ?? '' ?>
                                    </li>
                                
								<?php endforeach ?>
                            
							</ul>
					
                        </td>
					</tr>

				<?php endforeach ?>

			</tbody>
		</table>
		
		<?php do_action( 'woocommerce_after_variations_table' ) ?>

		<div class="single_variation_wrap">
			
			<?php
				do_action( 'woocommerce_before_single_variation' );

				do_action( 'woocommerce_single_variation' );

				do_action( 'woocommerce_after_single_variation' );
			?>
		
		</div>
	
	<?php endif ?>

	<?php do_action( 'woocommerce_after_variations_form' ) ?>

</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ) ?>