<?php get_header( '', [ 'title' => get_the_title() ] ) ?>

<main class="hero" style="background-image: url('<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'home_top_bgimage' ), 'full' ) ?>')">

вв
<div class="container">
        <h1 class="hero-title"><?php echo carbon_get_the_post_meta( 'home_top_title' ) ?></h1>
        <p class="text">
            <?php echo carbon_get_the_post_meta( 'home_top_subtitle' ) ?>
        </p>
        <div class="hero-btn">
            <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
            <a href="#contact-us" class="btn"><?php _e( 'Ask a question' ) ?></a>
        </div>
    </div>
</main>

<section class="advantages">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_advans_title' ) ?></h2>
        <p class="text"><?php echo carbon_get_the_post_meta( 'home_advans_subtitle' ) ?></p>
        <ul class="advantages-list">

            <?php
            $advans = carbon_get_the_post_meta( 'home_advans' );
            
            foreach ( $advans as $advan ): ?>
            <li class="advantages-item">
                <img src="<?php echo wp_get_attachment_image_url( $advan[ 'image' ] ) ?>" alt="flower" />
                <h3><?php echo $advan[ 'title' ] ?></h3>
                <p class="text"><?php echo $advan[ 'subtitle' ] ?></p>
            </li>
            <?php endforeach ?>

        </ul>
        <div style="width: 100%; height: 304px; margin-top: 32px">
            <img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'home_advans_bgimage' ), 'full' ) ?>" alt="" style="object-fit: cover; width: 100%; height: 100%; border-radius: 16px" />
        </div>
    </div>
</section>

<section class="home-about">
    <div class="container">
        <div class="content">
            <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_about_title' ) ?></h2>
            <p class="text">
                <?php echo carbon_get_the_post_meta( 'home_about_text' ) ?>
            </p>
            <a href="<?php the_permalink( 128 ) ?>" class="btn"><?php _e( 'Learn more' ) ?></a>
        </div>
        <div class="photo-flex">
            <?php
            $images = carbon_get_the_post_meta( 'home_about_images' );

            foreach ( $images as $image ): ?>
            <div class="img-card"><img src="<?php echo wp_get_attachment_image_url( $image, 'medium_large' ) ?>" alt="<?php _e( 'flowers' ) ?>" /></div>
            <?php endforeach ?>
            
        </div>
    </div>
</section>

<section class="home-works">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_bouquets_title' ) ?></h2>
        <p class="text">
            <?php echo carbon_get_the_post_meta( 'home_bouquets_subtitle' ) ?>
        </p>
        <div class="swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    
                    <?php
                    $prod_cats = get_terms( 'product_cat' );

                    foreach ( $prod_cats as $prod_cat ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo wp_get_attachment_image_url( get_term_meta( $prod_cat->term_id, 'thumbnail_id', true ), 'medium_large' ) ?>" alt="" />
                        <div class="slide-card">
                            <h3><?php echo full_term_name( $prod_cat->term_id ) ?></h3>
                            <p class="text"><?php echo $prod_cat->description ?></p>
                            <a href="<?php echo get_term_link( $prod_cat->term_id )  ?>" class="btn"><?php _e( 'Choose a bouquet' ) ?></a>
                        </div>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="button-next"><?php _e( 'Next' ) ?> <img src="<?php echo get_template_directory_uri() ?>/assets/img/Right.svg" alt="arrow" /></div>
            <div class="button-prev"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Left.svg" alt="arrow" /><?php _e( 'Back' ) ?></div>
        </div>
    </div>
</section>

<section class="shop-preview" style="background-image: url('<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'home_spreview_bgimage' ), 'full' ) ?>')">
    <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_spreview_title' ) ?></h2>
    <p class="text">
        <?php echo carbon_get_the_post_meta( 'home_spreview_subtitle' ) ?>
    </p>
    <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
</section>

<section class="question">
    <div class="container">
        <div class="question-left">
            <img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'home_faq_image' ), 'medium_large' ) ?>" alt="" />
            <p class="text">
                <?php _e( 'Do you have any questions? Contact us<br /> by email' ) ?> 
                <a href="mailto:<?php echo carbon_get_theme_option( 'flowers_email' ) ?>"><?php echo carbon_get_theme_option( 'flowers_email' ) ?></a> 
                <br /> <?php _e( 'or phone' ) ?>
                <a href="tel:<?php echo carbon_get_theme_option( 'flowers_phones' )[0][ 'number' ] ?>"><?php echo carbon_get_theme_option( 'flowers_phones' )[0][ 'number' ] ?></a>
            </p>
        </div>
        <div class="gustion-right">
            <h2 class="section-title"><?php echo carbon_get_theme_option( 'home_faq_title' ) ?></h2>
            <ul class="question-list">
                
                <?php
                $faq_items = carbon_get_the_post_meta( 'home_faq_items' );
                
                foreach ( $faq_items as $faq_item ): ?>
                <li class="guestion-item">
                    <div class="guestion-body">
                        <h3 class="guestion-title"><?php echo $faq_item[ 'title' ] ?></h3>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/ExpandArrowgrey.svg" alt="" />
                    </div>

                    <p class="text answer">
                        <?php echo $faq_item[ 'text' ] ?>
                    </p>
                </li>
                <?php endforeach ?>

            </ul>
        </div>
    </div>
</section>

<section class="reviews">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_reviews_title' ) ?></h2>
        <p class="text">
            <?php echo carbon_get_the_post_meta( 'home_reviews_subtitle' ) ?>
        </p>
        <div class="swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    
                    <?php
                    $reviews = carbon_get_the_post_meta( 'home_reviews_items' );
                    
                    foreach ( $reviews as $review ): ?>
                    <div class="swiper-slide">
                        <h3><?php echo $review[ 'title' ] ?></h3>
                        <p class="text"><?php echo $review[ 'text' ] ?></p>
                        <ul class="rate-list">
                            <?php for ( $i=0; $i < $review[ 'rating' ]; $i++ ): ?>
                            <li class="rate-item"><img src="<?php echo get_template_directory_uri() ?>/assets/img/StarFilled.svg" alt="" /></li>
                            <?php endfor ?>
                        </ul>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="button-next"><?php _e( 'Next') ?> <img src="<?php echo get_template_directory_uri() ?>/assets/img/RightW.svg" alt="arrow" /></div>
            <div class="button-prev"><img src="<?php echo get_template_directory_uri() ?>/assets/img/LeftW.svg" alt="arrow" /><?php _e( 'Back' ) ?></div>
        </div>
        <div class="photo-card">
            <img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'home_reviews_image' ), 'full' )  ?>" alt="" />
        </div>
    </div>
</section>

<section class="choose">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'home_stat_title' ) ?></h2>
        <ul class="choose-list">
            
            <?php 
            $stats = carbon_get_the_post_meta( 'home_stat_items' );
            
            foreach ( $stats as $stat ): ?>
            <li class="chose-item">
                <div class="img-price">
                    <img src="<?php echo wp_get_attachment_image_url( $stat[ 'image' ], 'medium_large' ) ?>" alt="" />
                    <p class="price"><?php echo $stat[ 'statvalue' ] ?></p>
                </div>
                <h3><?php echo $stat[ 'title' ] ?></h3>
                <p class="text"><?php echo $stat[ 'subtitle' ] ?></p>
            </li>
            <?php endforeach ?>

        </ul>
    </div>
</section>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>