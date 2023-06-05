<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

	<?php if ($checkout->get_checkout_fields()) : ?>

		<?php do_action('woocommerce_checkout_before_customer_details'); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action('woocommerce_checkout_billing'); ?>
			</div>
			<div class="col-2">
				<h4>Tipo de factura</h4>
				<p class="form-row form-row-wide billing-type" id="radio_button_field_field" data-priority="">
					<span class="woocommerce-input-wrapper">
						<label for="radio_button_field_consumidor_final" class="radio ">
							<input onclick="change(this)" type="radio" class="input-radio " value="consumidor_final" name="radio_button_field" id="radio_button_field_consumidor_final" checked="checked">
							Consumidor final
						</label>

						<label for="radio_button_field_credito_fiscal" class="radio ">
							<input onclick="change(this)" type="radio" class="input-radio " value="credito_fiscal" name="radio_button_field" id="radio_button_field_credito_fiscal">
							Crédito fiscal
						</label>

						<label for="radio_button_field_venta_empleados" class="radio ">
							<input onclick="change(this)" type="radio" class="input-radio " value="venta_empleados" name="radio_button_field" id="radio_button_field_venta_empleados">
							Venta empleados
						</label>
					</span>
				</p>
			</div>
		</div>


	<?php endif; ?>

	<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

	<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

	<?php do_action('woocommerce_checkout_before_order_review'); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action('woocommerce_checkout_order_review'); ?>
	</div>

	<?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<script>
	function change(evt) {
		switch (evt.value) {
			case 'credito_fiscal':
				credito();
				break;
			case 'consumidor_final':
				reset();
				break;
			case 'venta_empleados':
				break;
		}
	}

	function setDoc(data) {
		el = document.querySelector("#billing_dui_field label");
		console.debug(el);
		el.textContent = data;
	}

	function setName(data) {
		el = document.querySelector("#billing_first_name_field label");
		console.debug(el);
		el.textContent = data;
	}

	function reset() {
		setName("Nombre");
		setDoc("Documento");
	}

	function credito() {
		setDoc("Número de registro (NRC)");
		setName("Nombre Contribuyente");
	}

	// Esta seccion solo funciona con el plugin de wooboost
	function empleados() {
		
	}
</script>
