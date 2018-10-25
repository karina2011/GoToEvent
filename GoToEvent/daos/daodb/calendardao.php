<?php
namespace daos\daodb;

use models\Event as M_Event;
use models\Calendar as M_Calendar;
use models\Artist as M_Artist;
use models\EventPlace as M_Event_place;
use daos\daodb\connection as Connection;
use daos\daodb\EventDao as D_Event;
use daos\daodb\EventPlaceDao as D_Event_place;
use daos\daodb\ArtistDao as D_Artist;

use PDOException;

class CalendarDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($calendar)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO calendars (date,id_event,id_event_place) VALUES (:date, :id_event, :id_event_place)";

        $parameters['date'] = $calendar->getDate();
        $parameters['id_event'] = $calendar->getEventId();
        $parameters['id_event_place'] = $calendar->getEventPlaceId();

        try 
        {
            
            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);

        } 
        catch(PDOException $e)
        {
            echo $e;
        }

    }

    public function readAll()
    {
        $sql = "SELECT * FROM calendars";

        try
        {

            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);

        } 
        catch(PDOException $e) 
        {

            echo $e;
        }

        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;       

    }

    public function readById ($id)
    {
        $sql = "SELECT * FROM calendars where id_calendar = :id_calendar";

        $parameters['id_calendar'] = $id;

        try 
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        } 
        catch(PDOException $e) 
        {
            echo $e;
        }

        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }

    public function read($id)
    {

    }

    public function readByIdEvent ($id_event)
    {
        $sql = "SELECT * FROM calendars where id_event = :id_event";

        $parameters['id_event'] = $id_event;

        try 
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        } 
        catch(PDOException $e) 
        {
            echo $e;
        }

        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }

    

    public function update ($id)
    {

    }

    public function delete ($id)
    {
        $sql = "DELETE FROM calendars WHERE id_calendar = :id_calendar";

        $parameters['id_calendar'] = $id;

        try 
        {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } 
        catch(PDOException $e) 
        {
            echo $e;
        }
   }

    

    /**
    * Transforma el listado de usuario en
    * objetos de la clase Usuario
	*
	* @param  Array $gente Listado de personas a transformar
	*/
	protected function mapear($value) {

		$value = is_array($value) ? $value : [];
        
		$resp = array_map(function($p){
            $event_place = $this->createEventPlace($p['id_event_place']);
            $event = $this->createEvent($p['id_event']);
            $artists = array(); 
            $artists[] = new M_Artist ("12345678", "Juansito", "Perez", 1);
            //flata buscar en la tabla intermedia todos los artistas que le perteneces a ese calendario
		    return new M_Calendar( $p['date'],$artists , $event_place, $event , $p['id_calendar']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }



     protected function createEventPlace($id)
     {
        $daoEventPlace = D_Event_place::getInstance();

        $event_place = $daoEventPlace->readById($id);

        $event_place = new M_Event_place($event_place['0']->getCapacity(),$event_place['0']->getDescription(),$event_place['0']->getId());

        return $event_place;
     }

     protected function createEvent($id)
     {
        $daoEvent = D_Event::getInstance();

        $event = $daoEvent->readById($id);

        $event = new M_Event($event['0']->getTitle(),$event['0']->getCategory(),$event['0']->getId());

        return $event;
     }
}
