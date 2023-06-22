<?php
/**
 * Template Name: Vistas Venta
 */

setcookie('compra', $wp->request, time() + 3600, '/');
get_header();
global $wp;
?>

<main id="main" class="container views-main">
  <div class="row row-cols-1 row-cols-md-3 g-2">
    <?php
    $products = get_posts(array(
                'post_type' => 'product',
                'numberposts' => -1,
                'orderby' => 'ID'
    ));
    foreach ($products as $product_post){
        setup_postdata($product_post);
        $product_id = $product_post->ID;
        $product = wc_get_product($product_id);

        get_template_part('woocommerce/product');
    }
    wp_reset_postdata();
    ?>
  </div>
</main>

<?php get_footer(); ?>
