<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class SOVA_Metafields
{
    public function __construct()
    {
        $this->hooks_init();
    }

    private function hooks_init()
    {
        add_action( 'carbon_fields_register_fields', [ $this, 'home_metafields' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'shop_metafields' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'contacts_metafields' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'gallery_metafields' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'about_metafields' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'checkout_metafields' ] );
    }

    public function home_metafields()
    {
        Container::make( 'post_meta', __( 'Home page metafields' ) )
            ->where( 'post_id', '=', get_option( 'page_on_front' ) )
            ->add_tab( __( 'Header' ), [
                Field::make( 'text', 'home_header_title', __( 'Title' ) ),
                Field::make( 'text', 'home_header_url', __( 'Url' ) ),
            ] )
            ->add_tab( __( 'Top section' ), [
                Field::make( 'text', 'home_top_title', __( 'Title' ) ),
                Field::make( 'text', 'home_top_subtitle', __( 'Subtitle' ) ),
                Field::make( 'image', 'home_top_bgimage', __( 'Background image' ) ),
            ] )
            ->add_tab( __( 'Advantages' ), [
                Field::make( 'text', 'home_advans_title', __( 'Title' ) ),
                Field::make( 'text', 'home_advans_subtitle', __( 'Subtitle' ) ),
                Field::make( 'complex',  'home_advans', __( 'Advantages' ))
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Titlte' ) ),
                        Field::make( 'text', 'subtitle', __( 'Subtitlte' ) ),
                        Field::make( 'image', 'image', __( 'Image' ) ),
                    ] ),
                Field::make( 'image', 'home_advans_bgimage', __( 'Background image' ) ),
            ] )
            ->add_tab( __( 'About section' ), [
                Field::make( 'text', 'home_about_title', __( 'Title' ) ),
                Field::make( 'textarea', 'home_about_text', __( 'Text' ) ),
                Field::make( 'media_gallery', 'home_about_images', __( 'Images' ) ),
            ] )
            ->add_tab( __( 'Bouquets' ), [
                Field::make( 'text', 'home_bouquets_title', __( 'Title' ) ),
                Field::make( 'text', 'home_bouquets_subtitle', __( 'Subtitle' ) ),
            ] )
            ->add_tab( __( 'Shop preview' ), [
                Field::make( 'text', 'home_spreview_title', __( 'Title' ) ),
                Field::make( 'text', 'home_spreview_subtitle', __( 'Subtitle' ) ),
                Field::make( 'image', 'home_spreview_bgimage', __( 'Background image' ) ),
            ] )
            ->add_tab( __( 'FAQ' ), [
                Field::make( 'text', 'home_faq_title', __( 'Title' ) ),
                Field::make( 'image', 'home_faq_image', __( 'Image' ) ),
                Field::make( 'complex', 'home_faq_items', __( 'FAQ' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'textarea', 'text', __( 'Text' ) ),
                    ] ),
            ] )
            ->add_tab( __( 'Reviews' ), [
                Field::make( 'text', 'home_reviews_title', __( 'Title' ) ),
                Field::make( 'text', 'home_reviews_subtitle', __( 'Subtitle' ) ),
                Field::make( 'complex', 'home_reviews_items', __( 'Reviews' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'textarea', 'text', __( 'Text' ) ),
                        Field::make( 'text', 'rating', __( 'Rating' ) ),
                    ] ),
                Field::make( 'image', 'home_reviews_image', __( 'Bottom image' ) ),
            ] )
            ->add_tab( __( 'Statistics' ), [
                Field::make( 'text', 'home_stat_title', __( 'Title' ) ),
                Field::make( 'complex', 'home_stat_items', __( 'Staticticts items' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'text', 'subtitle', __( 'Subtitle' ) ),
                        Field::make( 'text', 'statvalue', __( 'Value' ) ),
                        Field::make( 'image', 'image', __( 'Image' ) ),
                    ] ),
            ] )
            ->add_tab( __( 'Contact form' ), [
                Field::make( 'text', 'home_form_title', __( 'Title' ) ),
                Field::make( 'text', 'home_form_subtitle', __( 'Subtitle' ) ),
                Field::make( 'image', 'home_form_image', __( 'Image' )),
            ] )
            ->add_tab( __( 'Footer' ), [
                Field::make( 'text', 'home_footer_map', __( 'Map link' ) ),
            ] );
    }

    public function shop_metafields()
    {
        Container::make( 'post_meta', __( 'Shop page metafields' ) )
            ->where( 'post_id', '=', wc_get_page_id( 'shop' ) )
            ->add_tab( __( 'Top section' ), [
                Field::make( 'image', 'shop_top_image', __( 'Image' ) ),
                Field::make( 'text', 'shop_top_title', __( 'Title' ) ),
                Field::make( 'text', 'shop_top_subtitle', __( 'Subtitle' ) ),
            ] )
            ->add_tab( __( 'Product list' ), [
                Field::make( 'text', 'shop_list_title', __( 'Title' ) ),
            ] );
    }

    public function contacts_metafields()
    {
        Container::make( 'post_meta', __( 'Contacts page metafields' ) )
            ->where( 'post_id', '=', 126 )
            ->add_tab( __( 'Top section' ), [
                Field::make( 'image', 'contacts_top_image', __( 'Image' ) ),
                Field::make( 'text', 'contacts_top_subtitle', __( 'Subtitle' ) ),
            ] )
            ->add_tab( __( 'Contacts' ), [
                Field::make( 'text', 'contacts_cont_title', __( 'Title' ) ),
                Field::make( 'text', 'contacts_cont_subtitle', __( 'Subtitle' ) ),
                Field::make( 'complex', 'contacts_cont_items', __( 'Contacts items' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'image', 'image', __( 'Image' ) ),
                    ] ),
            ] );
    }

    public function gallery_metafields()
    {
        Container::make( 'post_meta', __( 'Gallery page metafields' ) )
            ->where( 'post_id', '=', 130 )
            ->add_tab( __( 'Top section' ), [
                Field::make( 'image', 'gallery_top_image', __( 'Image' ) ),
                Field::make( 'text', 'gallery_top_subtitle', __( 'Subtitle' ) ),
            ] )
            ->add_tab( __( 'Gallery' ), [
                Field::make( 'text', 'gallery_title', __( 'Title' ) ),
                Field::make( 'complex', 'gallery_images', __( 'Gallery items' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'image', 'image', __( 'Image' ) ),
                    ] ),
            ] );
    }

    public function about_metafields()
    {
        Container::make( 'post_meta', __( 'About page metafields' ) )
            ->where( 'post_id', '=', 128 )
            ->add_tab( __( 'Top section' ), [
                Field::make( 'image', 'about_top_image', __( 'Image' ) ),
                Field::make( 'text', 'about_top_subtitle', __( 'Subtitle' ) ),
            ] )
            ->add_tab( __( 'Advantages' ), [
                Field::make( 'text', 'about_advan_title', __( 'Title' ) ),
                Field::make( 'text', 'about_advan_subtitle', __( 'Subtitle' ) ),
                Field::make( 'complex', 'about_advan_items', __( 'Advantages' ) )
                    ->add_fields( [
                        Field::make( 'text', 'title', __( 'Title' ) ),
                        Field::make( 'text', 'subtitle', __( 'Subtitle' ) ),
                        Field::make( 'image', 'image', __( 'Image' ) ),
                    ] ),
            ] )
            ->add_tab( __( 'Information' ), [
                Field::make( 'image', 'about_inf_top_img', __( 'Top image' ) ),
                Field::make( 'text', 'about_inf_top_title', __( 'Top title' ) ),
                Field::make( 'textarea', 'about_inf_top_text', __( 'Top text' ) ),
                Field::make( 'media_gallery', 'about_inf_images', __( 'Images' ) ),
                Field::make( 'textarea', 'about_inf_bottom_text', __( 'Bottom text' ) ),
                Field::make( 'text', 'about_inf_bottom_title', __( 'Bottom title' ) ),
            ] );
    }

    public function checkout_metafields()
    {
        Container::make( 'post_meta', __( 'Checkout page metafields' ) )
            ->where( 'post_id', '=', wc_get_page_id( 'checkout' ) )
            ->add_tab( __( 'Checkout steps' ), [
                Field::make( 'separator', 'checkout_contacts_separator', 'Contacts step' ),
                Field::make( 'text', 'checkout_contacts_title', __( 'Title' ) ),
                Field::make( 'text', 'checkout_contacts_subtitle', __( 'Subtitle' ) ),
                Field::make( 'separator', 'checkout_gift_separator', 'Gift step' ),
                Field::make( 'text', 'checkout_gift_title', __( 'Title' ) ),
                Field::make( 'text', 'checkout_gift_subtitle', __( 'Subtitle' ) ),
                Field::make( 'separator', 'checkout_shipping_separator', 'Shipping step' ),
                Field::make( 'text', 'checkout_shipping_title', __( 'Title' ) ),
                Field::make( 'text', 'checkout_shipping_subtitle', __( 'Subtitle' ) ),
                Field::make( 'separator', 'checkout_payment_separator', 'Payment step' ),
                Field::make( 'text', 'checkout_payment_title', __( 'Title' ) ),
                Field::make( 'text', 'checkout_payment_subtitle', __( 'Subtitle' ) ),
            ] );
    }
}