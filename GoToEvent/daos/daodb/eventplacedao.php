<?php
namespace daos\daodb;

use models\Event_place as M_Event_place;
use daos\daodb\connection as Connection;
use PDOException;

class EventPlaceDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($event_place)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

        $sql = "INSERT INTO event_places (capacity,description,id_event_place) VALUES (:capacity, :description,:id_event_place)";

        $parameters['capacity'] = $event_place->getCapacity();
        $parameters['description'] = $event_plcae->getDescription();
        $parameters['id_event_place'] = $event_place->getId();

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
        $sql = "SELECT * FROM event_places";

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

    public function read ($id_event_place)
    {
        $sql = "SELECT * FROM event_places where id_event_place = :id_event_place";

        $parameters['id_event_place'] = $id_event_place;

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

    public function delete ($id_event_place)
    {
        $sql = "DELETE FROM event_places WHERE id_event_place = :id_event_place";

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

    

    /**
    * Transforma el listado de lugares de evento en
    * objetos de la clase event_place
	*
	*/
	protected function mapear($value) {

		$value = is_array($value) ? $value : [];
        
		$resp = array_map(function($p){
		    return new M_Event_place( $p['capacity'], $p['description'], $p['id_event_place']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
