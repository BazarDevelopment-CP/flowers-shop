<?php
$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>

<div class="pagination woocommerce-pagination">
	<?php
	$pag_items = paginate_links(
		apply_filters(
			'woocommerce_pagination_args',
			[
				'base'      => $base,
				'format'    => $format,
				'add_args'  => false,
				'current'   => max( 1, $current ),
				'total'     => $total,
				'prev_text' => '<div class="btn"><img src="' . get_template_directory_uri() . '/assets/img/LeftW.svg" alt="" /></div>',
				'next_text' => '<div class="btn"><img src="' . get_template_directory_uri() . '/assets/img/RightW.svg" alt="" /></div>',
				'type'      => 'list',
				'end_size'  => 3,
				'mid_size'  => 3,
                'type' => 'array'
            ]
		)
	);
    
	foreach ( $pag_items as $pag_item ): ?>
        <?php echo $pag_item ?>
    <?php endforeach ?>
</div>