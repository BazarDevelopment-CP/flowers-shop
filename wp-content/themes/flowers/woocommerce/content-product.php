<?php global $product; ?>

<li <?php wc_product_class( 'product-card', $product ) ?>>
    
    <?php
    do_action( 'woocommerce_before_shop_loop_item' );

    do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>
    
    <div class="prod-info">
        <?php
        do_action( 'woocommerce_shop_loop_item_title' );

        do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
    </div>
    
    <?php
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>

</li>