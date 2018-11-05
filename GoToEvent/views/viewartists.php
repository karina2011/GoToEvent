<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Artistas</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">
	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

</head>
<body>

	<?php include_once (VIEWS."header.php");?>

<?php if(isset($lista)){  ?>
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>D.N.I</th>
			<th>ID</th>
		</tr>
	<?php while(!empty($lista)){ ?>
		<?php $artista = array_pop($lista) ?>
		<tr>
			<td><?php echo $artista->getName(); ?></td>
			<td><?php echo $artista->getLastName(); ?></td>
			<td><?php echo $artista->getDni(); ?></td>
			<td><?php echo $artista->getId(); ?></td>
		</tr>
	<?php } ?>
	</table>
<?php } else { ?>
	<h2>No hay artistas</h2>
	<?php } ?>
	<br><br>
	<div>
		<a href="<?php echo BASE; ?>views/index">Volver al incio</a>
	</div>


	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
