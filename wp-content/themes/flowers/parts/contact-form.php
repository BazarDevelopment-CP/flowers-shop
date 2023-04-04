<section class="contact-us" id="contact-us">
    <div class="container">
        <div class="contact-left"><img src="<?php echo wp_get_attachment_image_url( carbon_get_post_meta( get_option( 'page_on_front' ), 'home_form_image' ), 'medium_large' ) ?>" alt="flowers" /></div>
        <div class="contact-right">
            <h2 class="section-title"><?php echo carbon_get_post_meta( get_option( 'page_on_front' ), 'home_form_title' ) ?></h2>
            <p class="text">
                <?php echo carbon_get_post_meta( get_option( 'page_on_front' ), 'home_form_subtitle' ) ?>
            </p>
            <form class="contactUs2-form" action="<?php echo admin_url( 'admin-ajax.php' ) ?>" method="POST" id="mainform" name="contact_form">
                <input type="hidden" name="action" value="callback_form">
                <input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce( SOVA_WP_Form::NONCE ) ?>">
                <input type="text" placeholder="<?php _e( 'Your name*' ) ?>" name="name" required />
                <input type="tel" placeholder="<?php _e( 'Phone number*' ) ?>" name="phone" required />
                <input type="email" name="email" placeholder="<?php _e( 'E-mail' ) ?>" />
                <textarea name="comment" placeholder="<?php _e( 'Comment' ) ?>"></textarea>

                <button class="btn" type="submit"><?php _e( 'Send the form' ) ?></button>
            </form>
        </div>
    </div>
</section>