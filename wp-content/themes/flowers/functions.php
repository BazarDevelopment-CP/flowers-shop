<?php

class SOVA_Theme
{
	public function __construct()
	{
		$this->hooks_init();
	}

	private function hooks_init()
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'after_setup_theme', [ $this, 'custom_logo' ] );
        add_action( 'after_setup_theme', [ $this, 'register_menu_locations' ] );
        add_filter( 'nav_menu_css_class', [ $this, 'nav_menu_css_classes' ], 1, 3 );
        add_filter( 'nav_menu_link_attributes', [ $this, 'nav_menu_link_attributes' ], 1, 3 );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
        add_action( 'init', [ $this, 'handle_forms' ] );
        add_action( 'init', [ $this, 'gifts_post_type' ] );
	}

	public function enqueue_styles()
	{
		wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
        wp_enqueue_style( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' );
        wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );
	}

    public function enqueue_scripts()
	{
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', [], false, true );
        wp_enqueue_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'sliders', get_template_directory_uri() . '/assets/js/sliders.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], false, true );
	}

    public function custom_logo()
    {
        add_theme_support( 'custom-logo' );
    }

    public function register_menu_locations()
    {
        register_nav_menus( [
            'header' => __( 'Header' ),
        ] );
    }

    public function nav_menu_css_classes( $classes, $item, $args )
    {
        if ( $args->menu == 'header' ) {
            $classes[] = 'nav-item';
        }

        return $classes;
    }

    public function nav_menu_link_attributes( $attr, $item, $args )
    {
        if ( $args->menu == 'header' ) {
            $attr[ 'class' ] = 'nav-link';
        }

        return $attr;
    }

    public function handle_forms()
    {
        new SOVA_WP_Form( 'callback_form', [
            'name' => SOVA_WP_Form::TEXT_REGEX,
            'phone' => SOVA_WP_Form::PHONE_REGEX,
            'email' => SOVA_WP_Form::EMAIL_REGEX . '|^$',
            'comment' => SOVA_WP_Form::TEXT_REGEX . '|^$',
        ] );
    }

    public function gifts_post_type()
    {
        // ( new SOVA_WP_Post_Type )
        //     ->name( 'gifts' )
        //     ->menu_icon( get_template_directory_uri() . '/assets/img/gifts.png' )
        //     ->create();
    }
}
new SOVA_Theme;

// metafields
require_once get_template_directory() . '/includes/metafields.php';
new SOVA_Metafields;

// woocommerce
require_once get_template_directory() . '/includes/wc-functions.php';
new SOVA_WC;

// functions
require_once get_template_directory() . '/includes/functions.php';