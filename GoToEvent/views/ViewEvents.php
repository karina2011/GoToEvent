<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Title</th>
		</tr>
	<?php while(!empty($lista)){ ?>
		<?php $event = array_pop($lista) ?>
		<tr>
			<td><?php echo $event->getTitle(); ?></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>