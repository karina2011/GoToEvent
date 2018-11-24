<?php
namespace daos\daodb;

use models\Event as M_Event;
use models\Calendar as M_Calendar;
use models\Artist as M_Artist;
use models\EventPlace as M_Event_place;
use models\EventSquare as M_Event_square;
use daos\daodb\connection as Connection;
use daos\daodb\EventDao as D_Event;
use daos\daodb\EventPlaceDao as D_Event_place;
use daos\daodb\ArtistDao as D_Artist;
use daos\daodb\CalendarArtistDao as D_Calendar_artist;
use daos\daodb\EventSquareDao as D_Event_square;

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
            /*echo "<pre>";
            var_dump($e);
            echo "</pre>";*/
            echo $e;
        }

    }

    public function validateDateInEventPlace($date,$id_event_place)
    {
        $sql = "Select *
                from calendars c inner join event_places ep on c.id_event_place = ep.id_event_place
                where c.date = :date and ep.id_event_place = :id_event_place ";

        $parameters['date'] = $date;
        $parameters['id_event_place'] = $id_event_place;

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

    public function validateDateInArtist($date,$id_artist)
    {
        $sql = "SELECT * FROM artists a inner join calendars_x_artists ca on a.id_artist=ca.id_artist
                                        inner join calendars c on c.id_calendar = ca.id_calendar where c.date = :date and a.id_artist = :id_artist";

        $parameters['date'] = $date;
        $parameters['id_artist'] = $id_artist;

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

            //echo $e;
            echo '<script>';
            echo 'console.log("Error en base de datos. Archivo: calendardao.php")';
            echo '</script>';
        }

        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;

    }

    public function readCalendarsCurrent()
    {
        $sql = "SELECT * FROM calendars WHERE date >= now() ORDER BY date ASC";

        try
        {

            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);

        }
        catch(PDOException $e)
        {

            //echo $e;
            echo '<script>';
            echo 'console.log("Error en base de datos. Archivo: calendardao.php")';
            echo '</script>';
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

    public function readByDate ($date)
    {
        $sql = "SELECT * FROM calendars where date = :date";

        $parameters['date'] = $date;

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

    public function readByCategory ($categoryId)
    {
        $sql = "SELECT * FROM calendars c INNER JOIN events e on c.id_event = e.id_event INNER JOIN categories cat
         on e.id_category = cat.id_category where cat.id_category = :category"; //:category = parameters[]..

        $parameters['category'] = $categoryId;

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

    public function readByArtist ($artistId)
    {
        $sql = "SELECT * FROM calendars c INNER JOIN calendars_x_artists ca on c.id_calendar = ca.id_calendar
         where ca.id_artist = :id_artist"; //:id_artist = parameters[]...

        $parameters['id_artist'] = $artistId;

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

    public function readEventPlaceByCalendarId ($id_calendar)
    {
        $sql = "SELECT ep.capacity FROM calendars c inner join event_places ep on c.id_event_place = ep.id_event_place where c.id_calendar = :id_calendar";

        $parameters['id_calendar'] = $id_calendar;

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
            return $resultSet;
        else
            return false;
    }

    public function readLast ()
    {
        $sql = "SELECT * FROM calendars ORDER BY id_calendar DESC LIMIT 1";

        $parameters[] = array();

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

    public function readLastFive ()
    {
        $sql = "SELECT * FROM calendars WHERE date >= now() ORDER BY date asc LIMIT 5";

        $parameters[] = array();

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

    public function read($id)
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



    public function update ($id,$date)
    {
      $sql = "UPDATE calendar SET date = :date  WHERE id_calendar = :id_calendar";
      $parameters['id_calendar'] = $id;
      $parameters['date'] = $date;

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
            echo "<script>alert('No se pueden borrar calendarios por el momento. Estamos en construccion')</script>";
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
            //$event_squares = $this->createEventSquare($p['id_event_square']);
            $event = $this->createEvent($p['id_event']);
            $artists = $this->createArtistList($p['id_calendar']); //busca en la tabla intermedia todos los artistas que le corresponden a ese calendario
            //flata buscar en la tabla intermedia todos los artistas que le perteneces a ese calendario
            /*echo "estos son los artistas";
            echo "<pre>";
            var_dump($artists);
            echo "</pre>";*/
		    return new M_Calendar( $p['date'],$artists , $event_place, $event , $p['id_calendar']);
        }, $value);

            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 1 ? $resp : $resp['0'];
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

        $event = new M_Event($event['0']->getTitle(),$event['0']->getCategory(),$event['0']->getImg(),$event['0']->getId());

        return $event;
     }

     protected function createArtistList($id_calendar)
     {
         $daoCalendarArtist = D_Calendar_artist::getInstance();

         $calendarArtistList = $daoCalendarArtist->read($id_calendar);

         /*echo "<pre>";
         var_dump($calendarArtistList);
         echo "</pre>";*/

         $daoArtist = D_Artist::getInstance();

         $artistList = array();

         foreach ($calendarArtistList as $key => $list) {
             $artistList[] = $daoArtist->readById($list['id_artist']);
         }
        /*echo "<pre>";
        var_dump($artistList);
        echo "</pre>";*/
         return $artistList;
     }

     protected function createEventSquare($id_event_square)
     {
       $daoEventSquare = D_Event_square::getInstance();

       $event_square = $daoEventSquare->read($id_event_square);

       if(is_array($event_square)){

         foreach ($event_square as $key => $value) {
           $eventSquareList[] = $daoEventSquare->read($value['id_event_square']);
         }

         return $eventSquareList;
       } else {
         return $event_square;
       }
     }

     public function getLastCalendar() // fijarse si no hay q borrar esto
     {
         $sql = "SELECT * FROM calendars order by id_calendar desc limit 1";

         $parameters = array();

         try
         {
             $this->connection = Connection::getInstance();
             $resultSet = $this->connection->Execute($sql, $parameters);
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

     public function getLastId(){ // devuelve el ultimo id del auto_increment , por mas q se hayan borrado algunos
        $sql = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'gotoevent' AND TABLE_NAME = 'calendars'";
        // https://es.stackoverflow.com/questions/111980/saber-el-auto-increment-de-una-tabla-mysql-despues-de-borrarse-los-ultimos-ids
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
            return $resultSet['0']['AUTO_INCREMENT']; // el resultado está ahi adentro
        else
            return false;
     }
}
