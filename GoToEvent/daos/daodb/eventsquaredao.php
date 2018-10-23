<?php 

namespace daos\daodb;

use models\Event_square as M_Event_square;
use models\Square_type as M_Square_type;
use daos\daodb\connection as Connection;
use daos\daodb\SquareTypeDao as DaoSquareType;
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

		$sql = "INSERT INTO event_squares (price,available_quantity,remainder,id_square_type) VALUES (:price, :available_quantity, :remainder, :id_square_type)";

        $parameters['price'] = $event_square->getPrice();
        $parameters['available_quantity'] = $event_square->getAvailableQuantity();
        $parameters['remainder'] = $event_square->getRemainder();
        $parameters['id_square_type'] = $event_square->getSquareTypeId();

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

    public function update ($id)
    {

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
		    return new M_Event_square( $p['price'], $p['available_quantity'], $p['remainder'],$square_type, $p['id_event_square']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }

     protected function createSquareType($id_square_type)
     {
        $daoSquareType = DaoSquareType::getInstance();

        $square_type = $daoSquareType->readById($id_square_type);

        $square_type = new M_Square_type($square_type['0']->getDescription(),$square_type['0']->getId());

        return $square_type;
     }

 }?>