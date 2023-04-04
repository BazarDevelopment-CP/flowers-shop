<?php global $product; ?>

<?php do_action( 'woocommerce_before_single_product' ) ?>

<section id="product-<?php the_ID() ?>" <?php wc_product_class( [ 'product', 'single-product', ], $product ) ?>>
    <div class="container">
        
        <?php do_action( 'woocommerce_before_single_product_summary' ) ?>

        <div class="summary entry-summary product-info">
            
            <?php do_action( 'woocommerce_single_product_summary' ) ?>

            <div class="description">
                
                <div class="description-top">
                    <h3><?php _e( 'Description' ) ?></h3>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shop/ExpandArrowBL.svg" alt="" />
                </div>
                
                <div class="description-body open">

                    <ul class="description-list">

                        <?php if ( $description = get_the_content() ) : ?>
                            
                            <li class="description-item">
                                <p class="description-name"><?php _e( 'Description' ) ?></p>
                                <p class="description-text"><?php echo $description ?></p>
                            </li>

                        <?php endif ?>

                        <?php
                        $prod_attrs = $product->get_attributes();
                        
                        foreach ( $prod_attrs as $prod_attr ) : ?>
                            
                            <li class="description-item">
                                <p class="description-name">
                                    <?php echo wc_attribute_label( $prod_attr->get_name() ) ?>
                                </p>
                                <p class="description-text">
                                    <?php echo prod_attrs_by_id( $prod_attr->get_options() ) ?>
                                </p>
                            </li>
                        
                        <?php endforeach ?>

                    </ul>

                </div>
           
            </div>
            
        </div>
    
    </div>
</section>

<?php do_action( 'woocommerce_after_single_product_summary' ) ?>

<?php do_action( 'woocommerce_after_single_product' ) ?>