<?php

namespace daos\daodb;

use models\Square_type as M_Square_type;
use daos\daodb\connection as Connection;
use PDOException;

class SquareTypeDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = null;
    }
    
    public function create($square_type)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO square_types (description) VALUES (:description)";

        $parameters['description'] = $square_type->getDescription();

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
        $sql = "SELECT * FROM square_types";

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
        $sql = "SELECT * FROM square_types where description = :description";

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

    public function readById ($id_square_type)
    {
        $sql = "SELECT * FROM square_types where id_square_type = :id_square_type";

        $parameters['id_square_type'] = $id_square_type;

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
        $sql = "DELETE FROM square_types WHERE description = :description";
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
		    return new M_Square_type( $p['description'], $p['id_square_type']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}