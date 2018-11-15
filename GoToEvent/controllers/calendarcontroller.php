<?php
namespace controllers;

use models\Calendar;
use models\Artist;
use models\EventPlace;
use models\Event;
use models\Event_square;
use daos\daodb\CalendarDao as Dao;
use daos\daodb\ArtistDao as D_Artist;
use daos\daodb\EventPlaceDao as D_Event_place;
use daos\daodb\EventDao as D_Event;
use daos\daodb\CalendarArtistDao as D_Calendar_artist;
use daos\daodb\EventSquareDao as D_Event_square;
use controllers\ViewsController as C_Views;

$daoEvent = D_Event::getInstance();
/**
 *
 */
class CalendarController
{
	protected $dao;

	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
    }

	public function create($date="", $id_event="", $artists=[], $id_event_place="")
	{
		$viewsController = new C_Views;
		if(empty($id_event)){

			$viewsController->calendarsAdmin();
			exit("<script>alert('Rellene todos los campos por favor')</script>");
		}
		if(empty($artists)){

			$viewsController->calendarsAdmin();
			exit("<script>alert('Rellene todos los campos por favor')</script>");
		}
		if(empty($id_event_place)){

			$viewsController->calendarsAdmin();
			exit("<script>alert('Rellene todos los campos por favor')</script>");
		}

		$fechaActual=strftime( "%Y-%m-%d", time()); // devuelve la fecha actual, en formato Año-mes-dia, igual q date

		if ($date < $fechaActual) // comprobar q la fecha sea posterior a la actua
		{
			require(ROOT . VIEWS . 'calendarsadmin.php');
			echo '<script>alert("NO PODES CREAR EVENTOS EN EL PASADO INUTIL");</script>';
		} else
			{
				$res = $this->validateDateInEventPlace($date,$id_event_place); //si res devuelve 0 es porque la fecha esta disponible
				$res2 = $this->validateDateInArtists($date,$artists);
				//falta comprobar que los artistas esten disponibles para esa fecha

					if($res == 0 && $res2 == 0)
					{// pasamos el arreglo de id de artistas que recibimos a objetos
						if(is_array($artists)){
							foreach ($artists as $key => $id_artist) {
								$artist_list [] = $this->readArtistById($id_artist); // $this-> para llamar al metodo de la propia  clase
							}
						} else {
							$artist_list [] = $this->readArtistById($artists);
						}

						// traer el objeto de lugar de evento y evento en base a su id
						$event_place = $this->readEventPlaceById($id_event_place);
						$event = $this->readEventById($id_event);

						// hacer comprobaciones arriba entre cada objeto

						$calendar = new Calendar($date,$artist_list,$event_place,$event);

						$daoCalendarArtist = D_Calendar_artist::getInstance(); // se obtiene una instancia del dao de calendario x artista

						//crea el calendario en la base de datos
						$this->dao->create($calendar);

						$calendar = $this->dao->readLast(); // te lo devuelve en forma de arreglo al ultimo calendario cargado
						/* bucle realizado para recorrer todos los artistas que perteneces a un evento y guardarlo en la tabla intermedia */

						foreach ($artist_list as $key => $artist)
						{
								$ids_calendar_artist['0'] = $calendar->getId();
								$ids_calendar_artist['1'] = $artist->getId();

								$daoCalendarArtist->create($ids_calendar_artist);
						}
						require(ROOT . VIEWS . 'addeventsquarestocalendar.php');

					} else {
						require(ROOT . VIEWS . 'calendarsadmin.php');
						echo "<script> alert('No esta disponible en esa fecha'); </script>";
					}
				}
	}

	public function readById($id)
	{
		$calendar = $this->dao->readById($id);

		return $calendar;
	}

 	/* Funcion que valida que el evento no este ocupado
	para la fecha que recibe por parametro   */
	public function validateDateInEventPlace($date,$id_event_place)
	{
		return $this->dao->validateDateInEventPlace($date,$id_event_place);
	}

	public function validateDateInArtists($date,$artists)
	{
		$res = 0;
		foreach ($artists as $key => $artist) {
			$res = $this->dao->validateDateInArtist($date,$artist);
			if($res > 0)
				return $res;
		}
		return $res;
	}
	public function readEventPlaceByCalendarId($id_calendar)
	{
		$capacity = $this->dao->readEventPlaceByCalendarId($id_calendar);
		return $capacity['0']['capacity'];
	}
	public function readAll()
	{
		$list = $this->dao->readAll();

		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
				$array[] = $list;
				$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;
	}

	public function delete($id_calendar)
	{
		$this->dao->delete($id_calendar);
		$list = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar un evento, al ya haber recorrido todos los eventos, la lista quedaba vacía, por eso hay q volver a leer
		require(ROOT . VIEWS . 'calendarsadmin.php');
	}

	public function readArtistById($id){

		$daoArtist = D_Artist::getInstance();

		$artist = $daoArtist->readById($id); // el readbyid devuelve el objeto adentro de un arreglo
		$dni = $artist['0']->getDni(); // en la posicion 0 del arreglo artist, está el objeto artista
		$name = $artist['0']->getName();
		$last_name = $artist['0']->getLastName();
		$id_artist = $artist['0']->getId();

		$artist = new Artist ($dni, $name, $last_name, $id_artist);

		return $artist;

	}

	public function readEventSquareById($id)
	{
		$daoEventSquare = D_Event_square::getInstance();

		$event_square = $daoEventSquare->read($id);
		echo "esto es lo que devuelve lo que se leeo de event suare por id: ";
		var_dump($event_square);
	}

	public function readEventPlaceById($id){

		$daoEventPlace = D_Event_place::getInstance();

		$event_place = $daoEventPlace->readById($id); // el readbyid devuelve el objeto adentro de un arreglo

		$capacity = $event_place['0']->getCapacity(); // en la posicion 0 del arreglo artist, está el objeto artista
		$description = $event_place['0']->getDescription();
		$id_event_place = $event_place['0']->getId();

		$event_place = new EventPlace ($capacity, $description, $id_event_place);

		return $event_place;
	}

	public function readEventById($id){
		$daoEvent = D_Event::getInstance();

		$event = $daoEvent->readById($id); // el readbyid devuelve el objeto adentro de un arreglo

		$title = $event['0']->getTitle();
		$category = $event['0']->getCategory();
		$id_event = $event['0']->getId();
		$img = $event['0']->getImg();

		$event = new Event ($title, $category,$img, $id_event);

		return $event;
	}

	public function readEventsByDate ($date)
	{

		$events = $daoEvent->readByDate($date);

		return $events;
	}

	public function readDateByIdEvent($idEvent)
	{
		$options = "<option value='0'>Seleccione una opcion</option>";
		$list = $this->dao->readByIdEvent($idEvent);
		//Comprueba que lo devuelto por la base de datos sea un array o un objeto
		if(is_array($list))		{
			//recorre el arreglo para crear los options que luegon son enviados al jqeury
			foreach ($list as $key => $value) {
				$id = $value->getId();
				$date = $value->getDate();
				//en options se guardan todas las fechas para luego mostrarlas mediante jquery
				$options .= "<option value='". $id ."'>".  $date . "</option>";

			}

		} else		{

			$id = $list->getId();
			$date = $list->getDate();
			$options = "<option value='". $id ."'>".  $date . "</option>";
		}

		echo $options;
	}

	public function readEventSquareAjax($id)
	{
		$calendar_list = $this->dao->readById($id);
		$options = "<option value='0'>Seleccione una opcion</option>";
		$event_squares = $calendar_list['0']->getEventSquares();

		if(is_array($event_squares)){

			foreach ($event_squares as $key => $event_square) {
				$id = $event_square->getId();
				$description = $event_square->getSquareTypeDescription();
				$price = $event_square->getPrice();

				$options .= "<option value='". $id ."'>".  $description . $price . "</option>";

			}
		} else {

			$id = $event_squares->getId();
			$description = $event_squares->getSquareTypeDescription();
			$price = $event_squares->getPrice();

			$options .= "<option value='". $id ."'>".  $description . " " . $price . "$" . "</option>";
		}

		echo $options;
	}

	public function generateId(){
		$id = $this->dao->getLastId();
		return $id;
	}

	public function readLastCalendar(){
		return $this->dao->readLast();
	}
}

?>
