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

				<label class="d-none" id="dateLabel">Fechas: </label>
				<select class="custom-select d-none" name="dates" id='date' required>
          <!-- LOS OPTIONS SE AGREGAN POR JQUERY -->
				</select>

				<label class="d-none" id="event_square_label">Plaza de evento: </label>
				<select class="custom-select d-none" id="event_square" name="event_square">
          <!-- LOS OPTIONS SE AGREGAN POR JQUERY -->
				</select>


				<label class="d-none" id="cantidad_label">Cantidad:  </label>
				<input type="number" name="quantity" id="cantidad_input" class="d-none">
				<!--<label>ID de compra: (hardcodeado)  </label>
				<input type="number" name="id_purchase">-->
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
