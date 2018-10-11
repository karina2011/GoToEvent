<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Borrar un evento</h3>
	<br><br>
	<form action="<?php echo BASE; ?>Event/delete" method='post'>
		<div>
			<label>Titulo: </label>
			<input type="text" name="titulo">
		</div>
		<br>
		<div>
			<input type="submit" name="">
		</div>
	</form>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>Home/index">Volver al inicio</a>
	</div>
</body>
</html>