<?php 
namespace controllers;

use models\Calendar;
use models\Artist;
use models\EventPlace;
use models\Event;
use daos\daodb\CalendarDao as Dao;
use daos\daodb\ArtistDao as D_Artist;
use daos\daodb\EventPlaceDao as D_Event_place;
use daos\daodb\EventDao as D_Event;
use daos\daodb\CalendarArtistDao as D_Calendar_artist;
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

	public function create($date="", $artists="", $id_event_place="", $id_event="")
	{	
		
		// pasamos el arreglo de id de artistas que recibimos a objetos
		foreach ($artists as $key => $id_artist) {
			$artist_list [] = $this->readArtistById($id_artist); // $this-> para llamar al metodo de la propia clase
		}

		// traer el objeto de artista, lugar de evento y evento en base a su id
		$event_place = $this->readEventPlaceById($id_event_place);
		$event = $this->readEventById($id_event);

		// hacer comprobaciones arriba entre cada objeto

		$calendar = new Calendar($date,$artist_list,$event_place,$event);

		$this->dao->create($calendar); 

		$calendar = $this->dao->readLast(); // te lo devuelve en forma de arreglo

		$daoCalendarArtist = D_Calendar_artist::getInstance();

		/*echo "<pre>";
		var_dump($artist_list);
		echo "</pre>";*/
		
		foreach ($artist_list as $key => $artist) {

			$ids_calendar_artist['0'] = $calendar['0']->getId();
			$ids_calendar_artist['1'] = $artist->getId();

			$daoCalendarArtist->create($ids_calendar_artist);
		}

		

		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		$list = $this->dao->readAll();
		/*echo "<pre>";
		var_dump($list);
		echo "</pre>";*/
		include(VIEWS . 'viewcalendars.php');
	}

	public function delete($id_calendar)
	{
		$this->dao->delete($id_calendar);
		$list = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar un evento, al ya haber recorrido todos los eventos, la lista quedaba vacía, por eso hay q volver a leer
		require(ROOT . VIEWS . 'viewcalendars.php');
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

		$title = $event['0']->getTitle(); // en la posicion 0 del arreglo artist, está el objeto artista 
		$category = $event['0']->getCategory();
		$id_event = $event['0']->getId();

		$event = new Event ($title, $category, $id_event);

		return $event;
	}



}

?>