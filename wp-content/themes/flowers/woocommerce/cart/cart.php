<?php do_action( 'woocommerce_before_cart' ) ?>

<section class="section-cart">

    <h2 class="section-title"><?php _e( 'Cart totals.' ) ?></h2>

    <div class="container">

        <div class="cart-goods">

            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ) ?>" method="POST">

                <?php do_action( 'woocommerce_before_cart_table' ) ?>

                <ul class="shop_table shop_table_responsive cart woocommerce-cart-form__contents cart-goods-list">

                    <?php 
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
                    
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item[ 'data' ], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item[ 'product_id' ], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item[ 'quantity' ] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ):
                            
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>
                                
                            <li class="cart-goods-item">

                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail;
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                }
                                ?>

                                <div class="goods-item-info">
                                    
                                    <p class="product-name">
                                        
                                        <?php 
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }

                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                        echo wc_get_formatted_cart_item_data( $cart_item );

                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item[ 'quantity' ] ) ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                        }
                                        ?>
                                    
                                    </p>
                                    
                                    <div class="quantity text">                                        
                                        <?php _e( 'Quantity:' ) ?>
                                        <p class="amount">
                                            <?php echo $cart_item[ 'quantity' ] ?>
                                        </p>
                                        <div class="plus change-quantity">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/Plus.svg" alt="" />
                                        </div>
                                        <div class="minus change-quantity">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/minus.svg" alt="" />
                                        </div>

                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $min_quantity = 1;
                                            $max_quantity = 1;
                                        } else {
                                            $min_quantity = 0;
                                            $max_quantity = $_product->get_max_purchase_quantity();
                                        }

                                        echo '<input class="d-none input-quantity" name="cart[' . $cart_item_key . '][qty]" value="' . $cart_item['quantity'] . '" max="' . $max_quantity . '" min="' . $min_quantity . '">'; 
                                        ?>
                                    </div>
                                    
                                    <div class="price">
                                        <?php _e( 'Price:' ) ?>
                                        <span><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ) ?></span>
                                    </div>
                                    
                                    <div class="subtotal">
                                        <?php _e( 'Subtotal:' ) ?> 
                                        <span><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) ?></span>
                                    </div>
                                    
                                    <div class="remove product-remove">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/Trash.svg" alt="Trash" />
                                        
                                        <?php
                                        echo apply_filters(
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="text" aria-label="%s" data-product_id="%s" data-product_sku="%s">' . __( 'Remove item' ) . '</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        )
                                        ?>
                            
                                    </div>
                                
                                </div>
                            
                            </li>

                        <?php endif ?>    

                    <?php endforeach ?>
                    
                    <li>

                        <button type="submit" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ) ?>" class="shop-btn update-button d-none"><?php _e( 'Update Cart' ) ?></button>

                        <?php do_action( 'woocommerce_cart_actions' ) ?>

                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ) ?>
                    
                    </li>
                            
                </ul>

                <?php do_action( 'woocommerce_after_cart_table' ) ?>

            </form>

        </div>

        <?php do_action( 'woocommerce_before_cart_collaterals' ) ?>

        <?php do_action( 'woocommerce_cart_collaterals' ) ?>

    </div>

</section>

<?php do_action( 'woocommerce_after_cart' ) ?>