<!DOCTYPE html>
<html>
<head>
	<title>Ver artistas</title>
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
</body>
</html>