<?php get_header( '', [ 'title' => get_the_title( wc_get_page_id( 'shop' ) ), ] ) ?>

<?php
if ( $prod_cat_slug = get_query_var( 'product_cat' ) ) {
    $_prod_cat = get_term_by( 'slug', $prod_cat_slug, 'product_cat' );
}
?>

<section class="shop-hero">
    <div class="container">
        <div class="left">
            <?php
            $image_id = isset( $_prod_cat ) ? get_term_meta( $_prod_cat->term_id, 'thumbnail_id', true ) : carbon_get_post_meta( wc_get_page_id( 'shop' ), 'shop_top_image' );
            ?>
            <img src="<?php echo wp_get_attachment_image_url( $image_id, 'medium_large' ) ?>" alt="" />
        </div>
        <div class="right">
            <h2 class="section-title">
                <?php echo isset( $_prod_cat ) ? full_term_name( $_prod_cat->term_id ) : carbon_get_post_meta( wc_get_page_id( 'shop' ), 'shop_top_title' ) ?>
            </h2>
            <p class="text">
                <?php echo isset( $_prod_cat ) ? $_prod_cat->description : carbon_get_post_meta( wc_get_page_id( 'shop' ), 'shop_top_subtitle' ) ?>
            </p>

            <?php get_template_part( 'parts/follow-us' ) ?>

        </div>
    </div>
</section>

<section class="shop">
    <div class="container">

        <div class="shop-list-top">
            <h2 class="section-title"><?php echo carbon_get_post_meta( wc_get_page_id( 'shop' ), 'shop_list_title' ) ?></h2>
            <div class="filters">
                <div class="category">
                    <div class="btn category-btn">
                        <?php _e( 'Category' ); echo isset( $_prod_cat ) ? '(' . full_term_name( $_prod_cat->term_id ) . ')' : '' ?> 
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/ExpandArrow.svg" alt="" />
                    </div>
                    <ul class="category-list">
                        <?php
                        $prod_cats = get_terms( 'product_cat' );

                        foreach ( $prod_cats as $prod_cat ): ?>
                        <li class="category-item">
                            <a href="<?php echo get_term_link( $prod_cat->term_id ) ?>"><?php echo full_term_name( $prod_cat->term_id ) ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="sort">
                   
                    <?php $sort_opts = get_sorting_options() ?>

                    <div class="btn sort-btn">
                        <?php _e( 'Sort' ); echo isset( $_GET[ 'orderby' ] ) ? '(' . $sort_opts[ $_GET[ 'orderby' ] ] . ')' : '' ?> 
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/ExpandArrow.svg" alt="arrow" />
                    </div>
                    <ul class="sort-list">
                        <?php foreach ( $sort_opts as $q_param => $name ): ?>
                        <li class="sort-item">
                            <?php if ( is_shop() ): ?>
                                <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>?orderby=<?php echo $q_param ?>"><?php echo $name ?></a>
                            <?php else: ?>
                                <a href="<?php echo get_term_link( $_prod_cat->term_id ) ?>?orderby=<?php echo $q_param ?>"><?php echo $name ?></a>
                            <?php endif ?>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                
            </div>
        </div>

        <ul class="goods-list">

            <?php if ( woocommerce_product_loop() ): ?>
            
                <?php while ( have_posts() ): the_post() ?>

                    <?php wc_get_template_part( 'content', 'product' ) ?>

                <?php endwhile ?>

            <?php else: ?>

                <?php do_action( 'woocommerce_no_products_found' ) ?>
           
            <?php endif ?>

        </ul>

        <?php do_action( 'woocommerce_after_shop_loop' ) ?>

    </div>
</section>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>