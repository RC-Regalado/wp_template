<?php
defined( 'ABSPATH' ) || exit;
global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col card product-card">
  <div class="image-container">
    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
      data-mdb-ripple-color="light">
      <?php
        do_action( 'woocommerce_before_shop_loop_item_title' );
      ?>
    </div>
  </div>
  <div class="card-body">
    <?php
      do_action( 'woocommerce_before_shop_loop_item' );
      do_action( 'woocommerce_shop_loop_item_title' );
      do_action( 'woocommerce_after_shop_loop_item_title' );
    ?>
  </div>
  <div class="card-footer">
    <div class="buttons">
      <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
        class="btn btn-primary"><?php echo esc_html( $product->add_to_cart_text() ); ?></a>
      <a href="<?php echo wc_get_cart_url(); ?>"
       class="btn btn-secondary"><?php esc_html_e( 'Ver carrito', 'woocommerce' ); ?></a>
    </div>
  </div>
</div>


