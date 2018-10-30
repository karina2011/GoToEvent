<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>
	
	<h3>Crear Ticket</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>ticket/create" method="post">
		<br>
			<div>
				<input type="submit" name="" value="Generar Ticket">
			</form>
	</div>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>
</body>
</html>