<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Crear Ticket</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>ticket/create" method="post">
			<div>
				<label>Numero: </label>
				<input type="text" name="Numero">
				<label>qr: </label>
				<input type="text" name="qr">
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