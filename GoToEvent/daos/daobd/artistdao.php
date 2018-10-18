<?php
namespace daos\daobd;

use models\Artist as M_Artist;
use daos\daobd\connection as Connection;
use PDOException;

class ArtistDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }
    
    public function create($artist)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO artists (name, last_name, dni) VALUES (:name, :last_name, :dni)";

        $parameters['name'] = $artist->getName();
        $parameters['last_name'] = $artist->getLastName();
        $parameters['dni'] = $artist->getDni();

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
        $sql = "SELECT * FROM artists";

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

    public function read ($dni)
    {
        $sql = "SELECT * FROM artists where dni = :dni";

        $parameters['dni'] = $dni;

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

    public function delete ($dni)
    {
        $sql = "DELETE FROM artists WHERE dni = :dni";
        $parameters['dni'] = $dni;

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
		    return new M_Artist( $p['dni'], $p['name'], $p['last_name'], $p['id_artist']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
