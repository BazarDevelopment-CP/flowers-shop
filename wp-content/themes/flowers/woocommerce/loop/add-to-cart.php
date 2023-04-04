<?php

global $product;

echo apply_filters(
	'woocommerce_loop_add_to_cart_link',
	sprintf(
		'<div class="btn-hidden"><button class="product-btn btn"><a href="%s" data-quantity="%s" class="%s" %s>%s</a></button></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args[ 'quantity' ] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args[ 'class' ] ) ? $args[ 'class' ] : 'button' ),
		isset( $args[ 'attributes' ] ) ? wc_implode_html_attributes( $args[ 'attributes' ] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
	$product,
	$args
);