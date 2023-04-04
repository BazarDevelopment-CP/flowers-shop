<div class="follow-us">
    <p><?php _e( 'Follow us' ) ?></p>
    
    <?php
    $medias = carbon_get_theme_option( 'flowers_media' );
    
    foreach ( $medias as $media ): ?>
    <a href="<?php echo $media[ 'url' ] ?>">
        <img src="<?php echo wp_get_attachment_image_url( $media[ 'image' ] ) ?>"/>
    </a>
    <?php endforeach ?>
</div>