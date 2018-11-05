<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>GoToEvent</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">
	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

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

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
