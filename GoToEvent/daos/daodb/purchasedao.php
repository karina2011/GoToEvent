<?php
namespace daos\daodb;

use models\Purchase as M_Purchase;
use daos\daodb\connection as Connection;
use PDOException;

class PurchaseDao extends Singleton implements \interfaces\Crud
{
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

    public function create($purchase)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

        $sql = "INSERT INTO purchases (pdate,id_purchase,customer) VALUES (:pdate,:id_purchase,:customer)"; // pdate = purchaste date
        // cambiar line purchase a purchase_line // como se guardan parametros que son objetos en BD ???
        $parameters['pdate'] = $purchase->getDate();
        $parameters['id_purchase'] = $purchase->getId();
        $parameters['customer'] = $purchase->getCustomerId();

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
        $sql = "SELECT * FROM purchases";

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

    public function read ($id_purchase)
    {
        $sql = "SELECT * FROM purchases where id_purchase = :id_purchase";

        $parameters['id_purchase'] = $id_purchase;

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

    public function delete ($id_purchase)
    {
        $sql = "DELETE FROM purchases WHERE id_purchase = :id_purchase";

        $parameters['id_purchase'] = $id_purchase;

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
    * Transforma el listado de compras en
    * objetos de la clase Compra
	*
	* @param  Array $gente Listado de compras a transformar
	*/
	protected function mapear($value) {

		$value = is_array($value) ? $value : [];
        
		$resp = array_map(function($p){
		    return new M_Purchase( $p['date'], $p['line_purchase'], $p['id_purchase'], $p['customer']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
