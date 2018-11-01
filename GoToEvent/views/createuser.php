<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>
	
	<h3>Crear usuario</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>user/create" method="post">
			<div>
				<label>Nombre: </label>
				<input type="text" name="name">
				<label>Apellido: </label>
				<input type="text" name="last_name">
                <label>email: </label>
				<input type="email" name="email">
				<label>dni: </label>
				<input type="text" name="dni">
				<label>tipo: </label>
				<select class="custom-select" id="inputGroupSelect01" name="type">
				 <option value="admin">Admin</option>
				 <option value="cliente">Cliente</option>
				</select>
				<label>Contraseña: </label>
				<input type="password" name="pass">				
			</div>
		<br>
			<div>
				<input type="submit" name="" value="enviar">
			</form>
	</div>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>
	

</body>
</html>