<?php
namespace daos\daodb;

use models\Purchase as M_Purchase;
use models\User as M_User;
use models\PurchaseLine as M_Purchase_line;

use daos\daodb\UserDao as DaoUser;
use daos\daodb\PurchaseLineDao as DaoPurchaseLine;

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

        $sql = "INSERT INTO purchases (date,customer_email,price) VALUES (:date,:customer_email,:price)"; // pdate = purchaste date

        $parameters['date'] = $purchase->getDate();
        $parameters['customer_email'] = $purchase->getCustomerEmail();
        $parameters['price'] = $purchase->getPrice();

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

    public function update ($id,$date)
    {
      $sql = "UPDATE purchases SET pdate = :pdate  WHERE id_purchase = :id_purchase";
      $parameters['id_purchase'] = $id;
      $parameters['pdate'] = $date;

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
            // buscar el cliente(usuario) a la base de datos
            $daoUser = DaoUser::getInstance();

            $customer = $daoUser->read($p['customer_email']);

            // buscar lineas de compras a la base de datos q coincidan con el id de compra

            $daoPurchaseLine = DaoPurchaseLine::getInstance();

            $purchaselines = $daoPurchaseLine->read($p['id_purchase']);

		    return new M_Purchase( $p['date'], $customer, $purchaselines, $p['price'],$p['id_purchase']);
        }, $value);

            /* devuelve un arreglo si tiene mas de un objeto, sino devuelve 1 solo objeto*/

            return count($resp) > 1 ? $resp : $resp['0'];
     }
}
