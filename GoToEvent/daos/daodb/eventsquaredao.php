<?php

namespace daos\daodb;

use models\Event_square as M_Event_square;
use models\Square_type as M_Square_type;
use models\Calendar as M_Calendar;
use daos\daodb\connection as Connection;
use daos\daodb\SquareTypeDao as DaoSquareType;
use daos\daodb\CalendarDao as DaoCalendar;
use PDOException;

class EventSquareDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($event_square)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO event_squares (price,available_quantity,remainder,id_square_type,id_calendar) VALUES (:price, :available_quantity, :remainder, :id_square_type, :id_calendar)";

        $parameters['price'] = $event_square->getPrice();
        $parameters['available_quantity'] = $event_square->getAvailableQuantity();
        $parameters['remainder'] = $event_square->getRemainder();
        $parameters['id_square_type'] = $event_square->getSquareTypeId();
        $parameters['id_calendar'] = $event_square->getCalendar();

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
        $sql = "SELECT * FROM event_squares";

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

    public function readAllByCalendarId($id_calendar)
    {
        $sql = "SELECT * FROM event_squares WHERE id_calendar = :id_calendar";

        $parameters['id_calendar'] = $id_calendar;

        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql,$parameters);

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

    public function read ($id_event_square)
    {
        $sql = "SELECT * FROM event_squares where id_event_square = :id_event_square";

        $parameters['id_event_square'] = $id_event_square;

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

    public function update ($id,$price)
    {
      $sql = "UPDATE event_squares SET price = :price  WHERE id_event_square = :id_event_square";
      $parameters['id_event_square'] = $id;
      $parameters['price'] = $price;

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

    public function delete ($id_event_square)
    {
        $sql = "DELETE FROM event_squares WHERE id_event_square = :id_event_square";

        $parameters['id_event_square'] = $id_event_square;

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
            $square_type = $this->createSquareType($p['id_square_type']);
            $calendar = $this->createCalendar($p['id_calendar']);
		        return new M_Event_square( $p['price'], $p['available_quantity'], $p['remainder'],$square_type, $calendar ,$p['id_event_square']);
        }, $value);

            /* devuelve un arreglo si hay mas de 1 dato, sino un objeto*/

            return count($resp) > 1 ? $resp : $resp['0']; // se modifico para q devuelva un solo objeto y no arreglo en caso de haber 1 solo // borrar comentario si funciona bien
     }

     protected function createSquareType($id_square_type)
     {
        $daoSquareType = DaoSquareType::getInstance();

        $square_type = $daoSquareType->readById($id_square_type);

        $square_type = new M_Square_type($square_type['0']->getDescription(),$square_type['0']->getId());

        return $square_type;
     }

     protected function createCalendar($id)
     {
       $daoCalendar = DaoCalendar::getInstance();

       $calendar = $daoCalendar->readById($id);

       $calendar = new M_Calendar($calendar->getDate(),$calendar->getArtists(),$calendar->getEventPlace(),$calendar->getEvent(),$calendar->getId());

       return $calendar;
     }

 }?>
