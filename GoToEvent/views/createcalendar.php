<?php
use daos\daodb\ArtistDao as D_Artist;
use daos\daodb\EventPlaceDao as D_Event_place;
use daos\daodb\EventDao as D_Event;

$daoArtist = D_Artist::getInstance();
$daoEventPlace = D_Event_place::getInstance();
$daoEvent = D_Event::getInstance();

$listArtist = $daoArtist->readAll();
$listEventPlace = $daoEventPlace->readAll();
$listEvent = $daoEvent->readAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php include_once (VIEWS."header.php");?>

	<h3>Crear Calendario</h3>
	</div>
		<br>
		<form action="<?php echo BASE; ?>calendar/create" method="post">
			<div>
				<label>Fecha: </label>
				<input type="date" name="date">
				<label require>Artistas: (HACER UNA COMPROBACION PARA Q NO INGRESE NINGUN ARTISTA, SINO SALTA ERROR) </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<?php foreach ($listArtist as $key => $artist) { ?>
							<input type="checkbox" name="artist[]" value="<?php echo $artist->getId(); ?>">
							<label for="artist"><?php echo $artist->getName() . ' ' .  $artist->getLastName(); ?></label>
							<?php } ?>
						</div>
					</div>
				</div>
				<label>Lugar de evento: </label>
				<select name="id_event_place">
					<?php foreach ($listEventPlace as $key => $event_place) { ?>
						<option value="<?php echo $event_place->getId(); ?>"><?php echo $event_place->getDescription(); ?></option>
					<?php } ?>
				</select>
				<label>Evento: </label>
				<select name='event'>
					<?php foreach ($listEvent as $key => $event) { ?>
						<option value="<?php echo $event->getId() ?>"><?php echo $event->getTitle(); ?></option>
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

<!-- <select class="custom-select" name="id_artist">
				<?php foreach ($listArtist as $key => $artist) { ?>
				 <option value="<?php echo $artist->getId(); ?>"><?php echo $artist->getName(); ?></option>
				<?php } ?>
				</select>-->
