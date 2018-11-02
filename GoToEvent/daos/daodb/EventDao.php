<?php
namespace daos\daodb;

use models\Event as M_Event;
use models\Category as M_Category;
use daos\daodb\connection as Connection;
use daos\daodb\CategoryDao as DaoCategory;
use PDOException;

class EventDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($event)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO events (title,category) VALUES (:title, :category)";

        $parameters['title'] = $event->getTitle();
        $parameters['category'] = $event->getCategoryId();

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
        $sql = "SELECT * FROM events";

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

    public function read ($title)
    {
        $sql = "SELECT * FROM events where title = :title";

        $parameters['title'] = $title;

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

    public function readById ($id)
    {
        $sql = "SELECT * FROM events where id_event = :id_event";

        $parameters['id_event'] = $id;

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
        $sql = "SELECT * FROM events where date = :date";

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

    public function update ($id)
    {

    }

    public function delete ($title)
    {
        $sql = "DELETE FROM events WHERE title = :title";

        $parameters['title'] = $title;

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
            $category = $this->createCategory($p['category']);
		    return new M_Event( $p['title'], $category , $p['id_event']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }

     protected function createCategory($id_category)
     {
        $daoCategory = DaoCategory::getInstance();

        $category = $daoCategory->readById($id_category);

        $category = new M_Category($category['0']->getDescription(),$category['0']->getId());

        return $category;
     }
}
