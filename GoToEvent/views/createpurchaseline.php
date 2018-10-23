<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Crear COMPRA</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>purchase/create" method="post">
			<div>
				<label>precio: </label>
				<input type="number" name="price">
				<label>Cantidad:  </label>
				<input type="number" name="quantity">
				<label>Plaza de evento: </label>
				<select class="custom-select" id="inputGroupSelect01" name="event_square">
				<?php  foreach ($list as $key => $event_square) { ?>
				 <option value="<?php echo $event_square->getId(); ?>"><?php  echo $event_square->getSquareTypeDescription(); ?></option>
				 <?php } ?>			 
				</select>
				<label>Email de cliente: seguir completando esta parte </label>
				<input type="email" name="email">
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
</body>
</html>