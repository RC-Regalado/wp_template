<?php
/**
 * Template Name: User Handling
 */
if ($wp->request == 'register') {
    if (isset($_POST['correo'])) {
        $username = sanitize_user($_POST['nombre_usuario']);
        $email = sanitize_email($_POST['correo']);
        $password = esc_attr($_POST['passwd']);
        $password_confirm = esc_attr($_POST['passwd_confirm']);

        if ($password !== $password_confirm) {
            echo 'Passwords do not match.';
            return;
        }

        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            $user = get_user_by('ID', $user_id);
            wp_set_auth_cookie($user_id);
            do_action('wp_login', $user->user_login, $user);

            wp_redirect('/');
            exit;
        } else {
            $error_message = $user_id->get_error_message();
            echo $error_message;
        }
    }
}

get_header();

?>

<main class="user-container">
    <div class="left-col">
        <?php
            $logo = get_template_directory_uri().'/logo.png';
$action = isset($_GET['action']) ? $_GET['action'] : '-';

if ($wp->request == 'register') {
    get_template_part('users/user', 'register');
} else {
    get_template_part('users/user', 'login');
}
?>
    </div>
    <div class="right-col">
        <div class="text">
            <p class="greeting">Bienvenido a</p>
            <p class="rume">The Rum <br> Shop</p>
        </div>
    </div>
</main>

<?php
get_footer();
?>


