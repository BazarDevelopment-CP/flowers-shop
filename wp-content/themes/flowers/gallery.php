<?php
/*
Template Name: Gallery Page
*/
?>

<?php get_header( '', [ 'title' => get_the_title(), ] ) ?>

<section class="gallery-hero">
    <div class="container">
        <div class="left"><img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'gallery_top_image' ), 'full' ) ?>" alt="" /></div>
        <div class="right">
            <h2 class="section-title"><?php the_title() ?></h2>
            <p class="text"><?php echo carbon_get_the_post_meta( 'gallery_top_subtitle' ) ?></p>
            <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
            
            <?php get_template_part( 'parts/follow-us' ) ?>

        </div>
    </div>
</section>

<section class="gallery-swiper">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'gallery_title' ) ?></h2>
        <div class="slider-container">
                <div class="slider">
                <?php
                    $gallery = carbon_get_the_post_meta( 'gallery_images' );

                    foreach ( $gallery as $image ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo wp_get_attachment_image_url( $image[ 'image' ], 'medium_large' ) ?>" alt="" />
                        <p class="text"><?php echo $image[ 'title' ] ?></p>
                    </div>
                    <?php endforeach ?>
                </div>
            
        </div>
        <!-- <div class="swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    
                    <?php
                    $gallery = carbon_get_the_post_meta( 'gallery_images' );

                    foreach ( $gallery as $image ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo wp_get_attachment_image_url( $image[ 'image' ], 'medium_large' ) ?>" alt="" />
                        <p class="text"><?php echo $image[ 'title' ] ?></p>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>

            <div class="button-next"><?php _e( 'Next' ) ?> <img src="<?php echo get_template_directory_uri() ?>/assets/img/RightW.svg" alt="arrow" /></div>
            <div class="button-prev"><img src="<?php echo get_template_directory_uri() ?>/assets/img/LeftW.svg" alt="arrow" /><?php _e( 'Back' ) ?></div>
        </div> -->
    </div>
</section>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>