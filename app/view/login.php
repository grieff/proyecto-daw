<!DOCTYPE html>
<html lang="en">

<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>


<div class="login">
	<h2>Iniciar sesión</h2>
	<form action="" method="POST" id="loginform">
		<label for="loguser">Usuario</label>
		<input type="text" name="loguser" class="form-control" id="loginuser" required>
		<label for="logpass">Contraseña</label>
		<input type="password" name="logpass" class="form-control" id="loginpass" required>


		<input type="submit" name="login" value="Iniciar sesión" class="input_form btn" id="loginBtn">

		<span class="error" id="loginerror"></span><br>
	</form>
	
</div>




<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>