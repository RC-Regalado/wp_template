<?php
// Estilo woocommerce {{{
function cargar_estilo_personalizado()
{
    wp_enqueue_style('estilo-personalizado', get_template_directory_uri() . '/css/commerce.css');
}
add_action('wp_enqueue_scripts', 'cargar_estilo_personalizado');
// }}}
add_filter('woocommerce_checkout_fields', 'checkout_override');
function checkout_override($fields)
{
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_address_2']);

    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_address_2']);

    unset($fields['billing']['billing_city']);


    $fields['billing']['billing_dui'] = array(
        'type'        => 'text',
        'class'       => array( 'form-row-wide' ),
        'label'       => __( 'DUI', 'woocommerce' ),
        'placeholder' => __( 'Ingresa tu número de DUI', 'woocommerce' ),
        'required'    => true,
        'clear'       => true,
    );

    return $fields;
}

function styles_loader()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/lib/bootstrap.min.css");
    wp_enqueue_style('fs', get_template_directory_uri() . "/lib/font-awesome.min.css");
    wp_enqueue_style('elegant', get_template_directory_uri() . "/lib/elegant-icons.css");
    wp_enqueue_style('style', get_template_directory_uri() . "/css/style.css");
    wp_enqueue_style('header', get_template_directory_uri() . "/css/header.css");
}

add_action('wp_enqueue_scripts', 'styles_loader');

?>
