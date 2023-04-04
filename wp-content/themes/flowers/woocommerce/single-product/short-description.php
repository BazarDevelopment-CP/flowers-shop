<?php
global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}
?>

<div class="woocommerce-product-details__short-description text">
	<?php echo $short_description ?>
</div>