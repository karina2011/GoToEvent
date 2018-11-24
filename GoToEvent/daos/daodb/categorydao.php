<?php
namespace daos\daodb;

use models\Category as M_Category;
use daos\daodb\connection as Connection;
use PDOException;
/**
 *
 */
class CategoryDao extends Singleton implements \interfaces\Crud
{
	private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

	public function create($category)
	{
		// Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO categories (description) VALUES (:description)";

        $parameters['description'] = $category->getDescription();

		try
		{

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);

        } catch(PDOException $e)
		{
            echo "<script> alert('No se pudo crear: la categoria ya existe');</script>";
            // https://sweetalert.js.org/ // for alerts with nice view


		}
	}

	public function readAll()
	{
		$sql = "SELECT * FROM categories";

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

	public function read($description)
	{
		$sql = "SELECT * FROM categories where description = :description";

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

		public function readCategoriesSet ()
		{
				$sql = "select
				ca.id_category,
				ca.description
				from calendars c inner join events e on c.id_event = e.id_event
				                  inner join categories ca on ca.id_category = e.id_category
				group by ca.id_category, ca.description";

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

  public function readById($id)
	{
		$sql = "SELECT * FROM categories where id_category = :id_category";

        $parameters['id_category'] = $id;

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

	public function delete($description)
	{
		$sql = "DELETE FROM categories WHERE description = :description";
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

	public function update($description,$id)
	{
		$sql = "UPDATE categories SET description = :description  WHERE id_category = :id_category";
		$parameters['id_category'] = $id;
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

	protected function mapear($value) {

		$value = is_array($value) ? $value : [];

		$resp = array_map(function($p){
		    return new M_Category( $p['description'], $p['id_category']);
        }, $value);

            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
 ?>
