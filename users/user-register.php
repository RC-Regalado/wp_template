<div class="form-container">
		<h1>Registrate</h1>

		<form method="post" action="/register">
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

</div>

