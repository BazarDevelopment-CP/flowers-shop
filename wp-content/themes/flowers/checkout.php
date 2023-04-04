<?php
/*
Template Name: Checkout Page
*/
?>

<?php get_header( '', [ 'title' => get_the_title(), ] ) ?>

<section class="order">
    <div class="container">
        
        <div class="order-left">

            <?php get_template_part( 'parts/checkout-products' ) ?>

        </div>
        
        <div class="order-right">

            <ul class="oreder-steps">

                <?php the_content() ?>

            </ul>

        </div>
   
    </div>
</section>


<?php get_footer() ?>