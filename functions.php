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
        'class'       => array( 'form-row-wide', 'empleado' ),
        'label'       => __('Código de empleado', 'woocommerce'),
        'required'    => false,
        'clear'       => true,
    );

    $fields['billing']['area'] = array(
        'type'        => 'text',
        'class'       => array( 'form-row-wide', 'empleado' ),
        'label'       => __('Área de la empresa', 'woocommerce'),
        'required'    => false,
        'clear'       => true,
    );

    return $fields;
}

add_action('woocommerce_checkout_process', 'custom_checkout_radio_buttons_validation');
function custom_checkout_radio_buttons_validation()
{
    if (empty($_POST['bill_type'])) {
        wc_add_notice(__('Por favor, selecciona una opción.', 'woocommerce'), 'error');
    }

    if ($_POST['payment_method'] == 'descuento_plania_gateway') {
        if ($_POST['bill_type'] != 'venta_empleados') {
            wc_add_notice(__('El descuento en planilla soló está disponible para empleados', 'woocommerce'), 'error');
        } else {
            if (empty($_POST['employee_code'])) {
                wc_add_notice(__('El código de empleado es requerido para descuento en planilla', 'woocommerce'), 'error');
            }
            if (empty($_POST['area'])) {
                wc_add_notice(__('Por favor ingrese su área de trabajo.', 'woocommerce'), 'error');
            }
            if (empty($_POST['billing_company'])) {
                wc_add_notice(__('Por favor ingrese la empresa para la cual trabaja.', 'woocommerce'), 'error');
            }
        }
    }
}

add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_radio_buttons_update_order_meta');
function custom_checkout_radio_buttons_update_order_meta($order_id)
{
    if ($_POST['bill_type']) {
        update_post_meta($order_id, 'bill_type', sanitize_text_field($_POST['bill_type']));
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
