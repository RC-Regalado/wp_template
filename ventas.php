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
      $args = array(
        'post_type' => 'product',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => '_assigned_page',
                'value' => $wp->request,
                'compare' => '=',
            ),
            array(
                'key' => '_assigned_page',
                'value' => 'all',
                'compare' => '=',
            )
        )
      );

      $products = new WP_Query($args);
      if ($products->have_posts()) {
          while ($products->have_posts()) {
              $products->the_post();
              get_template_part('woocommerce/product');
          }
          wp_reset_postdata();
      } else {
          echo __('No se encontraron productos', 'woocommerce');
      }
    ?>
  </div>
</main>

<?php get_footer(); ?>
