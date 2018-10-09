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
			<th>D.N.I</th>
		</tr>
	<?php while(!empty($lista)){ ?>
		<?php $artista = array_pop($lista) ?>
		<tr>
			<td><?php echo $artista->getName(); ?></td>
			<td><?php echo $artista->getLastName(); ?></td>
			<td><?php echo $artista->getDni(); ?></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>