<?php
/*
Template Name: About Page
*/
?>

<?php get_header( '', [ 'title' => get_the_title(), ] ) ?>

<section class="about-hero">
    <div class="container">
        <div class="left"><img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'about_top_image' ), 'full' ) ?>" alt="" /></div>
        <div class="right">
            <h2 class="section-title"><?php the_title() ?></h2>
            <p class="text">
                <?php echo carbon_get_the_post_meta( 'about_top_subtitle' ) ?>
            </p>
            <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
            
            <?php get_template_part( 'parts/follow-us' ) ?>

        </div>
    </div>
</section>

<section class="about-advanages">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'about_advan_title' ) ?></h2>
        <p class="text"><?php echo carbon_get_the_post_meta( 'about_advan_subtitle' ) ?></p>
        <ul class="about-advanages-list">
            
            <?php
            $advans = carbon_get_the_post_meta( 'about_advan_items' );

            foreach ( $advans as $advan ): ?>
            <li class="about-advantages-item">
                <img src="<?php echo wp_get_attachment_image_url( $advan[ 'image' ] ) ?>" alt="" />
                <h3><?php echo $advan[ 'title' ] ?></h3>
                <p class="text"><?php echo $advan[ 'subtitle' ] ?></p>
            </li>
            <?php endforeach ?>

        </ul>
        <div class="img-block">
            <img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'about_inf_top_img' ), 'full' ) ?>" alt="" />
        </div>
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'about_inf_top_title' ) ?></h2>
        <p class="text">
            <?php echo carbon_get_the_post_meta( 'about_inf_top_text' ) ?>
        </p>
        <div class="photo-flex">
            <?php
            $gallery = carbon_get_the_post_meta( 'about_inf_images' );

            foreach ( $gallery as $image ): ?>
                <img src="<?php echo wp_get_attachment_image_url( $image, 'medium_large' ) ?>" alt="">
            <?php endforeach ?>
        </div>
        <p class="text" style="margin-top: 15px">
            <?php echo carbon_get_the_post_meta( 'about_inf_bottom_text' ) ?>
        </p>
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/QuoteLeft.svg" alt="" style="margin-top: 15px" />
        <h2 class="section-title" style="max-width: 100%">
            <?php echo carbon_get_the_post_meta( 'about_inf_bottom_title' ) ?>
        </h2>
        <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
    </div>
</section>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>