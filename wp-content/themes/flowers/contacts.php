<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header( '', [ 'title' => get_the_title(), ] ) ?>

<section class="contacts-hero">
    <div class="container">
        <div class="left"><img src="<?php echo wp_get_attachment_image_url( carbon_get_the_post_meta( 'contacts_top_image' ), 'full' ) ?>" alt="" /></div>
        <div class="right">
            <h2 class="section-title"><?php the_title() ?></h2>
            <p class="text">
                <?php echo carbon_get_the_post_meta( 'contacts_top_subtitle' ) ?>
            </p>
            <a href="<?php the_permalink( wc_get_page_id( 'shop' ) ) ?>" class="btn"><?php _e( 'Look at the products' ) ?></a>
           
            <?php get_template_part( 'parts/follow-us' ) ?>
        
        </div>
    </div>
</section>

<section class="contacts-advanages">
    <div class="container">
        <h2 class="section-title"><?php echo carbon_get_the_post_meta( 'contacts_cont_title' ) ?></h2>
        <p class="text"><?php echo carbon_get_the_post_meta( 'contacts_cont_subtitle' ) ?></p>
        <ul class="contacts-advanages-list">
            
            <?php
            $contacts = carbon_get_the_post_meta( 'contacts_cont_items' );

            foreach ( $contacts as $index => $contact ): ?>
            <li class="contacts-advantages-item">
                <img src="<?php echo wp_get_attachment_image_url( $contact[ 'image' ] ) ?>" alt="" />
                <h3><?php echo $contact[ 'title' ] ?></h3>
                <div class="info">

                    <?php switch ( $index ): 

                    case 0: ?>
                        <a href="mailto:<?php echo carbon_get_theme_option( 'flowers_email' ) ?>"><?php echo carbon_get_theme_option( 'flowers_email' ) ?></a>
                    <?php break ?>

                    <?php case 1: ?>
                        <?php
                        $phones = carbon_get_theme_option( 'flowers_phones' );

                        foreach ( $phones as $phone ): ?>
                            <a href="tel:<?php echo $phone[ 'number' ] ?>"><?php echo $phone[ 'number' ] ?></a>
                        <?php endforeach ?>
                    <?php break ?>

                    <?php case 2: ?>
                        <span><?php echo carbon_get_theme_option( 'flowers_address' ) ?></span>
                    <?php break ?>

                    <?php endswitch ?>

                </div>
            </li>
            <?php endforeach ?>

        </ul>
    </div>
</section>

<?php get_template_part( 'parts/contact-form' ) ?>

<?php get_footer() ?>