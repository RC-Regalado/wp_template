<?php
/*
 * Template Name: Formulario de pago personalizado
 */

// Asegurarse de que Woocommerce esté activo
if (! class_exists('woocommerce')) {
    exit;
}

// Incluir el encabezado de WordPress
get_header();

// Comprobar si el usuario ha iniciado sesión
if (! is_user_logged_in()) {
    echo '<p>Debes iniciar sesión para acceder al formulario de pago.</p>';
} else {
    // Obtener los detalles del usuario
    $user_id = get_current_user_id();
    $user_data = get_userdata($user_id);

    // Obtener la dirección de envío del usuario
    $shipping_address = WC()->session->get('customer')['shipping_address'];

    // Obtener el carrito de compras
    $cart = WC()->cart->get_cart();
    $cart_items = array();
    foreach ($cart as $cart_item_key => $cart_item) {
        // Obtener los detalles de los productos en el carrito
        $product = wc_get_product($cart_item['product_id']);
        $cart_items[] = array(
            'name'      => $product->get_name(),
            'quantity'  => $cart_item['quantity'],
            'price'     => $product->get_price(),
            'subtotal'  => $product->get_price() * $cart_item['quantity']
        );
    }

    // Calcular el total del carrito
    $cart_total = WC()->cart->get_total();

    // Mostrar el formulario de pago personalizado
?>
<div class="ch-container checkout">
<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
  <input type="hidden" name="action" value="custom_payment">
  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
  <input type="hidden" name="cart_items" value='<?php echo json_encode($cart_items); ?>'>

  <label for="name">Nombre completo:
    <input type="text" name="name" id="name" value="<?php echo $user_data->display_name; ?>">
  </label>

  <label for="email">Correo electrónico:
    <input type="email" name="email" id="email" value="<?php echo $user_data->user_email; ?>">
  </label>

  <label for="shipping_address">Dirección de envío:
    <textarea name="shipping_address" id="shipping_address"><?php echo $shipping_address; ?></textarea>
  </label>

  <label for="card_number">Número de tarjeta:
    <input type="text" name="card_number" id="card_number">
  </label>

  <label for="expiration_date">Fecha de vencimiento:
    <input type="text" name="expiration_date" id="expiration_date">
  </label>

  <label for="cvv">CVV:
    <input type="text" name="cvv" id="cvv">
  </label>

  <label for="total">Total:
    <?php echo $cart_total; ?>
  </label>

  <input type="submit" text="Pagar"/>
</form>
</div>
<?php
}
get_footer();
?>
