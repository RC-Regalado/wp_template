<div class ="login-form" >
    <?php
        wp_login_form(
            array(
                'echo' => true ,
                'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] .'/' ,
               	'label_username' => __( 'Nombre de usuario ' ),
               	'label_password' => __( 'Contraseña' ),
               	'label_remember' => __( 'Recuérdame' )
                )
        );
?>

</div>
