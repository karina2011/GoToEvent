<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Crear COMPRA</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>purchase/create" method="post">
			<div>
				<label>date: </label>
				<input type="date" name="date">
				<label>email de cliente: </label>
				<input type="email" name="email">
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