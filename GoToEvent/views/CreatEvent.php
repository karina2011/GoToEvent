<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Crear Evento</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>Event/creat" method="post">
			<div>
				<label>Titulo: </label>
				<input type="text" name="title">
				<label>ID Evento: </label>
				<input type="number" name="id_event" required>
			</div>
		<br>
			<div>
				<input type="submit" name="" value="enviar">
			</form>
	</div>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>Home/index">Volver al incio</a>
	</div>
	

</body>
</html>