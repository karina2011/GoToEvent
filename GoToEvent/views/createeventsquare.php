<?php 
use daos\daodb\SquareTypeDao as DaoSquareType;

$daoSquareType = DaoSquareType::getInstance();

$list = $daoSquareType->readAll();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php include_once (VIEWS."header.php");?>
	
	<h3>Crear plaza de evento</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>eventsquare/create" method="post">
			<div>
				<label>Precio: </label>
				<input type="text" name="price">
				<label>Cantidad disponible: </label>
				<input type="number" name="available_quantity">
                <label>Remanente: </label>
				<input type="number" name="remainder">
				<label>Tipo de plaza: </label>
				<select class="custom-select" id="inputGroupSelect01" name="square_type">
				<?php  foreach ($list as $key => $square_type) { ?>
				 <option value="<?php echo $square_type->getId(); ?>"><?php  echo $square_type->getDescription(); ?></option>
				 <?php } ?>			 
				</select>
				
				
				
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
