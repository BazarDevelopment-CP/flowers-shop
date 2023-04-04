<?php if ( $upsells ): ?>

<section class="olso-like">
    <div class="container">
        <h2 class="section-title"><?php _e( 'You will also like' ) ?></h2>
        <ul class="goods-list">
        
        <?php foreach ( $upsells as $upsell ) : ?>

            <?php
            $post_object = get_post( $upsell->get_id() );

            setup_postdata( $GLOBALS['post'] =& $post_object );
            wc_get_template_part( 'content', 'product' );
            ?>

        <?php endforeach ?>
        
        </ul>
    </div>
</section>

<?php endif ?>