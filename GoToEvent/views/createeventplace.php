<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>

	<h3>Crear Lugar de evento</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>EventPlace/create" method="post">
			<div>
				<label>Descripcion: </label>
				<input type="text" name="description">
				<label>Capacidad: </label>
				<input type="text" name="capacity">
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