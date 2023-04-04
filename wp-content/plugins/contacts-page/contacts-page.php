<?php

/*
Plugin Name: Contacts Admin Page
Description: Admin page for contact information
Author: Sidun Oleh
*/

defined( 'ABSPATH' ) or die;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class SOVA_Contact_Admin_Page
{
    public function __construct()
    {
        $this->init_hooks();
    }

    private function init_hooks()
    {
        add_action( 'carbon_fields_register_fields', [ $this, 'add_admin_contact_page' ] );
    }

    public function add_admin_contact_page()
    {
        Container::make( 'theme_options', __( 'Contact Inf' ) )
            ->set_icon( 'dashicons-phone' )
            ->add_fields( [
                Field::make( 'complex', 'flowers_phones', __( 'Phones' ) )
                    ->add_fields( [
                        Field::make( 'text', 'number', __( 'Number' ) ),
                    ] ),
                Field::make( 'complex', 'flowers_media', __( 'Social Media' ) )
                    ->add_fields( [
                        Field::make( 'image', 'image', __( 'Icon' ) ),
                        Field::make( 'text', 'url', __( 'Link' ) ),
                    ] ),
                Field::make( 'text', 'flowers_email', __( 'E-mail' ) ),
                Field::make( 'text', 'flowers_address', __( 'Address' ) ),
            ]);
    }
}

new SOVA_Contact_Admin_Page;