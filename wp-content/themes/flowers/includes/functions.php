<?php

function sova_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
    
    echo '<img src="' . $custom_logo_url . '" alt="' . get_bloginfo( 'name' ) . '">';
}

function sova_pre( $arg ) {
    echo '<pre>';
    print_r( $arg );
    echo '</pre>';
}

function get_sorting_options() {
    return apply_filters( 'woocommerce_catalog_orderby', [
        // 'menu_order' => __( 'Default sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        // 'rating'     => __( 'Sort by average rating', 'woocommerce' ),
        'date'       => __( 'Sort by latest', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    ] );
}

function full_term_name( int $term_id ) {
    $term = get_term( $term_id );
    if ( ! $term ) {
        return;
    }

    if ( $term->parent != 0 ) {
        $full_name = full_term_name( $term->parent ) . ' ' . $term->name;
    } else {
        $full_name = $term->name;
    }

    return $full_name;
}

function prod_attrs_by_id( array $attrs_ids ): string {
    $attrs = array_map( function ( $option ) {
        if ( $term = get_term( $option  )) {
            return $term->name;
        } else {
            return $option;
        }
    }, $attrs_ids );

    return implode( ', ',  $attrs );
}

function get_template_part_data( $template ) {
    ob_start();
    get_template_part( $template );
    $temlate_data = ob_get_contents();
    ob_end_clean();

    return $temlate_data;
}