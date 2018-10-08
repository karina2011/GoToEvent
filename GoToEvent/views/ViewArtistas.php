<!DOCTYPE html>
<html>
<head>
	<title>Ver artistas</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
		</tr>
	<?php while(!empty($lista)){ ?>
		<?php $artista = array_pop($lista) ?>
		<tr>
			<td><?php echo $artista->getNombre(); ?></td>
			<td><?php echo $artista->getApellido(); ?></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>