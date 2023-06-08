<?php

if (!defined('ABSPATH')) {
	exit;
}

$class = $gateway->id == 'descuento_plania_gateway' ? 'hide-gateway' : '';
?>

	<li id="item_<?php echo esc_attr($gateway->id) ?>" class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?> <?php echo $class; ?>">

	<label for="payment_method_<?php echo esc_attr($gateway->id); ?>">
		<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
		<?php echo $gateway->get_title(); ?>
	</label>
	<?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (!$gateway->chosen) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;" <?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
