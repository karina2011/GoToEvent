<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Crear artista</h1>
	<br><br>
	<form action="<?php echo BASE; ?>Artist/create" method="post" accept-charset="utf-8">
	  <div>
	    <label for="name">Nombre: </label>
	    <input type="text" name="name" value="" placeholder="Nombre">
	  </div>
	  <br>
	  <div>
	    <label for="lastName">Apellido: </label>
	    <input type="text" name="lastName" value="" placeholder="LastName">
	  </div>
	  <br>
	  <div>
	    <label for="dni">D.N.I: </label>
	    <input type="text" name="dni" value="" placeholder="D.N.I">
	  </div>
	  <br>
	  <div>
	    <input type="submit" name="boton" value="Enviar">
	  </div>
	</form>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>
</body>
</html>