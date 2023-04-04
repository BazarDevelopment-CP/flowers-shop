<?php
global $product;

$attachment_ids = $product->get_gallery_image_ids();
?>

<?php if ( $attachment_ids && $product->get_image_id() ) : ?>
    
    <ul class="additional-img">
    
        <?php foreach ( $attachment_ids as $attachment_id ) : ?>
            
            <li><?php echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ) ?></li>
        
        <?php endforeach ?>
    
    </ul>

<?php endif ?>