<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title><?php echo $args[ 'title' ] ?> | <?php bloginfo( 'name' ) ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <?php wp_head() ?>

</head>

<body>
    
    <header>
        <div class="header-top">
            <div class="container">
                
                <div class="adress">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/MapPin.svg" alt="<?php __( 'Map Pin' ) ?>" />
                    <a href="<?php echo carbon_get_post_meta( get_option( 'page_on_front' ), 'home_header_url' ) ?>">
                        <?php echo carbon_get_post_meta( get_option( 'page_on_front' ), 'home_header_title' ) ?>
                    </a>
                </div>
                
                <div class="tell">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/RingerVolume.svg" alt="<?php __( 'Ringer Volume' ) ?>" />
                    
                    <?php 
                    $phones = carbon_get_theme_option( 'flowers_phones' );

                    foreach ( $phones as $phone ): ?>
                    <a href="tel:<?php echo $phone[ 'number' ] ?>"><?php echo $phone[ 'number' ] ?></a>
                    <?php endforeach ?>
                    
                </div>
            
            </div>
        </div>
        
        <div class="header">
            <div class="container">
                <div class="header-body">
                    
                    <a href="<?php echo home_url() ?>" class="header-logo">
                        <?php sova_custom_logo() ?>
                    </a>

                    <div class="header-right">

                        <?php wp_nav_menu( [
                            'menu' => 'header',
                            'menu_class' => 'nav-list',
                            'menu_id' => '',
                            'container' => 'nav',
                            'container_class' => 'header-nav',
                            'container_id' => '',
                        ] ) ?>

                        <div class="mini-cart">
                            <a href="<?php the_permalink( wc_get_page_id( 'cart' ) ) ?>" class="cart">
                                <svg class="cart-icon" width="24" height="24">
                                    <use href="<?php echo get_template_directory_uri() ?>/assets/img/symbol-defs.svg#icon-ShoppingBag"></use>
                                </svg>
                                <p class="cart-num"><?php WC()->cart->get_cart_contents_count() ?></p>
                            </a>

                            <?php if ( ! is_cart() and ! is_checkout() ) : ?>
                                <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart() ?></div>
                            <?php endif ?>
                        
                        </div>

                        <button class="shop-btn">
                            <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>"><?php _e( 'Shop' ) ?></a> 
                        </button>
                        <div class="header-burger"><span></span></div>
                    </div>
                
                </div>
            </div>
        </div>
    </header>