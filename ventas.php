<?php
/**
 * Template Name: Vistas Venta
 */

setcookie('compra', $wp->request, time() + 3600, '/');
get_header();
global $wp;


?>

<main id="main" class="container">
	<div id="ttr_main" class="row">
		<div id="ttr_content" class="col">
			<div class="row">
<div
  data-block-name="woocommerce/product-new"
  class="wc-block-grid wp-block-product-new wc-block-product-new has-3-columns has-multiple-rows"
>
  <ul class="wc-block-grid__products">
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 10,
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) {
    while ( $products->have_posts() ) {
        $products->the_post();
        wc_get_template_part( 'content', 'product' );
    }
    wp_reset_postdata();
} else {
    echo __( 'No se encontraron productos', 'woocommerce' );
}

?>
  </ul>
</div>

			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
