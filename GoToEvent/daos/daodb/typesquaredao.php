<?php

namespace daos\daodb;

use models\Type_square as M_Type_square;
use daos\daobd\connection as Connection;
use PDOException;

class TypeSquareDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = null;
    }
    
    public function create($type_square)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO types_squares (description, id_event_square) VALUES (:description, :id_event_square)";

        $parameters['description'] = $type_square->getDescription();
        $parameters['id_event_square'] = $artist->getIdEventSquare();

		try {
			

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);

        } 
        catch(PDOException $e) {

			echo $e;
		}
    }

    public function readAll()
    {
        $sql = "SELECT * FROM types_squares";

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

    public function read ($description)
    {
        $sql = "SELECT * FROM types_squares where description = :description";

        $parameters['description'] = $description;

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

    public function delete ($description)
    {
        $sql = "DELETE FROM artists WHERE description = :description";
        $parameters['description'] = $description;

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

    public function checkDni($dni){
       
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
		    return new M_Artist( $p['description'], $p['id_event_square'], $p['id_type_square']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}