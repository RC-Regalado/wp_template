<?php
if (isset($_GET['correo'])) {
    $email = sanitize_email($_GET['correo']);
    if (email_exists($email)) {
        echo json_decode(["err" => 1]);
        return;
    }
} elseif (isset($_POST['correo'])) {
    $username = sanitize_user($_POST['nombre_usuario']);
    $email = sanitize_email($_POST['correo']);
    $password = esc_attr($_POST['passwd']);
    $password_confirm = esc_attr($_POST['passwd_confirm']);

    if ($password !== $password_confirm) {
        echo 'Passwords do not match.';
        return;
    }

    $user_id = wp_create_user($username, $password, $email);
} else {
    ?>

<div class="form-container">
		<h1>Registrate</h1>

		<form method="post" action="/login?action=register">
			<label for="nombre_usuario">
				Nombre de usuario:			
				<input type="text" id="nombre_usuario" name="nombre_usuario" required>
			</label>

			<label for="correo">
				Correo electrónico:
				<input type="email" id="correo" name="correo" required>
			</label>

			<label for=passwd>
				Contraseña:
				<input type="password" id="passwd" name="passwd" required>
			</label>

			<label for="passwd_confirm">
				Validar contraseña:
				<input type="password" id="passwd_confirm" name="passwd_confirm" required>
			</label>

			<input class="submit" type="submit" value="Registrarme">
		</form>

	<script>
		
	</script>
</div>
<?php
}
?>


