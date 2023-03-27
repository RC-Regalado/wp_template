<div class ="login-form" >
    <img id="rlogo"  src="<?= get_template_directory_uri().'/logo.png' ?>" alt="" width="75" style="margin: 5px 0 25px 0;" >
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
