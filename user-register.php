<?php
	if (isset($_POST['submit'])) {
		$username = sanitize_user($_POST['username']);
		$email = sanitize_email($_POST['email']);
		$password = esc_attr($_POST['password']);
		$password_confirm = esc_attr($_POST['password_confirm']);

		if ($password !== $password_confirm) {
    	echo 'Passwords do not match.';
		  return;
		}

		$user_id = wp_create_user($username, $password, $email);
    } else {
?>

<div class="form-container">
		<h1>Registrate</h1>

		<form method="post" action="procesar_registro.php">
			<label for="nombre_usuario">
				Nombre de usuario:			
				<input type="text" id="nombre_usuario" name="nombre_usuario" required>
			</label>

			<label for="correo">
				Correo electrónico:
				<input type="email" id="correo" name="correo" required>
			</label>

			<label for="contraseña">
				Contraseña:
				<input type="password" id="contraseña" name="contraseña" required>
			</label>

			<label for="validacion_contraseña">
				Validar contraseña:
				<input type="password" id="validacion_contraseña" name="validacion_contraseña" required>
			</label>

			<input class="submit" type="submit" value="Registrarme">
		</form>
</div>
<?php
	}
?>


