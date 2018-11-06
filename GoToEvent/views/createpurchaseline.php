<?php
use daos\daodb\EventSquareDao as D_Event_square;
use daos\daodb\EventDao as D_Event;

$daoEventSquare = D_Event_square::getInstance();
$daoEvent = D_Event::getInstance();

$list = $daoEventSquare->readAll();
$listEvent = $daoEvent->readAll();


 ?>
<head>
	<title>GoToEvent</title>
	 <link href="<?php echo BASE; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE; ?>assets/css/shop-homepage.css" rel="stylesheet">

</head>
<body>

	<?php include_once (VIEWS."header.php");?>

	<h3>Crear Linea Compra</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>purchaseLine/create" method="post">
			<div>
				<label>Evento: </label>
				<select class="custom-select" name="event" id="event">
					<?php foreach($listEvent as $key => $event) {?>
						<option value="<?php echo $event->getId(); ?>"><?php echo $event->getTitle(); ?></option>
					<?php } ?>
				</select>

				<label for="">Fechas: </label>
				<select class="custom-select" name="dates" id='date' required>
					<option value="0">Seleciona una fecha</option>
				</select>

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
				<label>ID de compra: (hardcodeado)  </label>
				<input type="number" name="id_purchase">
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
	<script src="<?php echo BASE; ?>assets/ajax.js"></script>
</body>
