<?php 
use daos\daodb\EventSquareDao as D_Event_square;

$daoEventSqaure = D_Event_square::getInstance();

$list = $daoEventSqaure->readAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>
	
	<h3>Crear Linea Compra</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>purchaseLine/create" method="post">
			<div>
				<label>Plaza de evento: </label>
				<select class="custom-select" id="inputGroupSelect01" name="event_square">
				<?php  foreach ($list as $key => $event_square) { 
				?>
				 <option value="<?php echo $event_square->getId(); ?>"><?php  echo $event_square->getSquareTypeDescription(); ?>
				 $<?php echo $event_square->getPrice();?></option>
				 <?php } ?>			 
				</select>
				<label>Cantidad:  </label>
				<input type="number" name="quantity">
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