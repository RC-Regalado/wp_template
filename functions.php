<?php
function cargar_estilo_personalizado() {
    wp_enqueue_style( 'estilo-personalizado', get_template_directory_uri() . '/css/commerce.css' );
}
add_action( 'wp_enqueue_scripts', 'cargar_estilo_personalizado' );

?>
