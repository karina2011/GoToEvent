<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

</head>
<body>

	<?php include_once (VIEWS."header.php");?>

	<h3>Crear Tipo de Plaza</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>SquareType/create" method="post">
			<div>
				<label>Descripcion: </label>
				<input type="text" name="description">
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

	<script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
