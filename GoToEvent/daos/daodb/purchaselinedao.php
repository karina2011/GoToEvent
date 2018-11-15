<?php
namespace daos\daodb;

use models\PurchaseLine as M_Purchase_line;
use daos\daodb\connection as Connection;
use daos\daodb\EventSquareDao as D_Event_Square;
use daos\daodb\TicketDao as D_Ticket;
use PDOException;

class PurchaseLineDao extends Singleton implements \interfaces\Crud
{
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

    public function create($purchaseline, $id_purchase='')
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

        $sql = "INSERT INTO purchase_lines (price,quantity,id_event_square, id_ticket, id_purchase)
         VALUES (:price,:quantity,:id_event_square,:id_ticket,:id_purchase)";

        $parameters['price'] = $purchaseline->getPrice();
        $parameters['quantity'] = $purchaseline->getQuantity();
        $parameters['id_event_square'] = $purchaseline->getEventSquareId();
        $parameters['id_ticket'] = $purchaseline->getTicketId();
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

    public function readAll()
    {
        $sql = "SELECT * FROM purchase_lines";

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

    public function read ($id_purchase_line)
    {
        $sql = "SELECT * FROM purchase_lines where id_purchase_line = :id_purchase_line";

        $parameters['id_purchase_line'] = $id_purchase_line;

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
      $sql = "UPDATE purchase_lines SET price = :price  WHERE id_purchase_line = :id_purchase_line";
      $parameters['id_purchase_line'] = $id;
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

    public function delete ($id_purchase_line)
    {
        $sql = "DELETE FROM purchase_line WHERE id_purchase_line = :id_purchase_line";

        $parameters['id_purchase_line'] = $id_purchase_line;

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
    * Transforma el listado de lineas de compra en
    * objetos de la clase linea de compra
	*
	* @param  Array lineas de compra a transformar
	*/
	protected function mapear($value) {

		$value = is_array($value) ? $value : [];

		$resp = array_map(function($p){

            $daoEventSquare = D_Event_Square::getInstance();
            $daoTicket = D_Ticket::getInstance();

            $event_square = $daoEventSquare->read($p['id_event_square']);
            $ticket = $daoTicket->read($p['id_ticket']);


		    return new M_Purchase_line( $p['price'], $p['quantity'], $event_square , $ticket,
            $p['id_purchase_line'] );

        }, $value);

            /*  devuelve un arreglo si hay mas de 1 dato, sino un objeto*/

            return count($resp) > 1 ? $resp : $resp['0'];
     }
}
