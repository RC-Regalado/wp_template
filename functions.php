<?php

// Estilo woocommerce {{{
function cargar_estilo_personalizado()
{
    wp_enqueue_style('estilo-personalizado', get_template_directory_uri() . '/css/commerce.css');
}
add_action('wp_enqueue_scripts', 'cargar_estilo_personalizado');
// }}}

// Checkout {{{
add_filter('woocommerce_checkout_fields', 'checkout_override');
function checkout_override($fields)
{
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_address_2']);

    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_address_2']);

    unset($fields['billing']['billing_city']);


    $fields['billing']['billing_dui'] = array(
        'type'        => 'text',
        'class'       => array( 'form-row-wide' ),
        'label'       => __('Documento', 'woocommerce'),
        'required'    => true,
        'clear'       => true,
    );

    $fields['billing']['employee_code'] = array(
        'type'        => 'text',
        'class'       => array( 'form-row-wide' ),
        'label'       => __('Código de empleado', 'woocommerce'),
        'required'    => true,
        'clear'       => true,
    );

    $fields['billing']['area'] = array(
        'type'        => 'text',
        'class'       => array( 'form-row-wide' ),
        'label'       => __('Área de la empresa', 'woocommerce'),
        'required'    => true,
        'clear'       => true,
    );

    return $fields;
}

add_action('woocommerce_checkout_process', 'custom_checkout_radio_buttons_validation');
function custom_checkout_radio_buttons_validation()
{
    if (empty($_POST['radio_button_field'])) {
        wc_add_notice(__('Por favor, selecciona una opción.', 'woocommerce'), 'error');
    }
}

add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_radio_buttons_update_order_meta');
function custom_checkout_radio_buttons_update_order_meta($order_id)
{
    if ($_POST['radio_button_field']) {
        update_post_meta($order_id, 'bill_type', sanitize_text_field($_POST['radio_button_field']));
    }
}
// }}}

function styles_loader()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/lib/bootstrap.min.css");
    wp_enqueue_style('fs', get_template_directory_uri() . "/css/lib/font-awesome.min.css");
    wp_enqueue_style('elegant', get_template_directory_uri() . "/css/lib/elegant-icons.css");
    wp_enqueue_style('style', get_template_directory_uri() . "/css/style.css");
    wp_enqueue_style('header', get_template_directory_uri() . "/css/header.css");
}

add_action('wp_enqueue_scripts', 'styles_loader');
