<?php global $product ?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<p class="product-price"><?php echo __( 'Price: ' ) . $price_html ?></p>
<?php endif ?>