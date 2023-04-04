<?php

class SOVA_WC
{
    public function __construct()
    {
        $this->remove_callbacks();
        $this->init_hooks();
    }

    public function init_hooks()
    {
        add_action( 'after_setup_theme', [ $this, 'woocommerce_support' ] );
        add_action( 'woocommerce_shop_loop_item_title', [ $this, 'template_loop_product_title' ] );
        add_filter( 'loop_shop_per_page', [ $this, 'loop_shop_per_page' ], 20 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
        add_filter( 'woocommerce_add_to_cart_fragments', [ $this, 'add_to_cart_fragments' ] );
        add_filter( 'woocommerce_shipping_calculator_enable_country', '__return_false' );
        add_filter( 'woocommerce_shipping_calculator_enable_state', '__return_false' );
        add_filter( 'woocommerce_shipping_calculator_enable_city', '__return_false' );
        add_filter( 'woocommerce_get_settings_products', [ $this, 'add_products_settings' ], 10, 2 );
        add_filter( 'woocommerce_gallery_image_html_attachment_image_params', [ $this, 'fancybox_single_product_images' ], 10, 4 );
        add_filter( 'woocommerce_checkout_fields', [ $this, 'change_checkout_fields' ] );
        add_action( 'woocommerce_checkout_update_order_meta', [ $this, 'update_checkout_fields' ] );
        add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );
        add_filter( 'default_checkout_billing_state', [ $this, 'set_default_state' ] );
        add_filter( 'default_checkout_billing_country', [ $this, 'set_default_country' ] );
    }

    public function remove_callbacks()
    {
        remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
        remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    }

    public function woocommerce_support()
    {
        add_theme_support( 'woocommerce' );
    }

    public function template_loop_product_title()
    {
        global $product;

        echo '<p class="product-name">' . $product->get_title() .  '</p>';
    }

    public function loop_shop_per_page()
    {
        return get_option( 'products_per_page' ) ?? 10;
    }

    public function add_to_cart_fragments( $fragments )
    {
        $fragments[ '.cart-num' ] = '<p class="cart-num">' . WC()->cart->get_cart_subtotal() . '</p>';
        $fragments[ '.checkout-list-products' ] = get_template_part_data( 'parts/checkout-products' );
        $fragments[ '.woocommerce-checkout-review-order-table' ] = get_template_part_data( 'woocommerce/checkout/review-order' );
    
        return $fragments;
    }

    public function add_products_settings( $settings, $current_section )
    {
        if ( $current_section ) {
            return $settings;
        }

        $settings[] = [
            'name' => 'Products count',
            'type' => 'title',
        ];
        $settings[] = [
            'id' => 'products_per_page',
            'name' => 'Products per page(shop page)',
            'type' => 'number',
        ];
        $settings[] = [
            'type' => 'sectionend',
        ];

        return $settings;
    }

    public function fancybox_single_product_images( $attrs, $attachment_id, $image_size, $main_image )
    {
        unset( $attrs[ 'title'] );
        $attrs[ 'data-fancybox' ] = 'gallery';

        return $attrs;
    }

    public function change_checkout_fields( $fields )
    {
        unset( $fields[ 'billing' ][ 'billing_company' ] );
        unset( $fields[ 'billing' ][ 'billing_city' ] );
        unset( $fields[ 'billing' ][ 'billing_address_1' ] );
        unset( $fields[ 'billing' ][ 'billing_address_2' ] );
        unset( $fields[ 'order' ][ 'order_comments' ] );

        $fields[ 'billing' ][ 'billing_cats' ] = [
            'type' => 'select',
            'label' => __( 'Choose category' ),
            'required' => true,
        ];
        $prod_cats = get_terms( 'product_cat' );
        foreach ( $prod_cats as $prod_cat ) {
            $fields[ 'billing' ][ 'billing_cats' ][ 'options' ][ full_term_name( $prod_cat->term_id ) ] 
                = full_term_name( $prod_cat->term_id );
        }

        $fields[ 'billing' ][ 'billing_cats_desc' ] = [
            'type' => 'textarea',
            'label' => __( 'Your text' ),
            'required' => true,
        ];

        return $fields;
    }

    public function update_checkout_fields( $order_id )
    {
        if ( ! empty( $_POST[ 'billing_cats' ] ) ) {
            update_post_meta( 
                $order_id, 
                __( 'Category' ), 
                sanitize_text_field( $_POST[ 'billing_cats' ] ) 
            );
        }

        if ( ! empty( $_POST[ 'billing_cats_desc' ] ) ) {
            update_post_meta( 
                $order_id, 
                __( 'Description' ), 
                sanitize_text_field( $_POST[ 'billing_cats_desc' ] ) 
            );
        }
    }

    public function set_default_state()
    {
        return 'WA';
    }

    public function set_default_country()
    {
        return 'US';
    }
}