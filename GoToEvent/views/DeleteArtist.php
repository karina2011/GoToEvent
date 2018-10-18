<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Borrar Artista</h3>
	<br><br>
	<form action="<?php echo BASE; ?>Artist/delete" method="post">
		<div>
			<label>D.N.I: </label>
		 	<input type="text" name="dni">
		</div>
		<br>
		<div>
			<input type="submit" name="">
		</div>
	</form>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al inicio</a>
	</div>
</body>
</html>