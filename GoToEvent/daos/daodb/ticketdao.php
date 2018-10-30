<?php 
namespace daos\daodb;

use models\Ticket as M_Ticket;
use daos\daodb\connection as Connection;
use PDOException;

/**
 * 
 */
class TicketDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = null;
	}

	public function create($ticket)
	{
	    // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		//TIENE DOBLE RR EL NUMBERR PORQUE CON UNA SOLA R ES UNA PALABRA RESERVADA DE PHP

		$sql = "INSERT INTO tickets (numberr, qr) VALUES (:numberr, :qr)";

        $parameters['numberr'] = $ticket->getNumber();
        $parameters['qr'] = $ticket->getQr();

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
        $sql = "SELECT * FROM tickets";

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

    public function read ($id)
    {
        $sql = "SELECT * FROM tickets where id_ticket = :id_ticket";

        $parameters['id_ticket'] = $id;

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

    public function readByNumber ($number)
    {
        $sql = "SELECT * FROM tickets where numberr = :numberr";

        $parameters['numberr'] = $number;

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

    public function getMaxId (){ // retorna el id maximo de los tickets
        $sql = "SELECT max(id_ticket) FROM tickets";

        try 
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql); // execute para select // executeNonQuery para inset, update y delete
        } 
        catch(PDOException $e) 
        {
            echo $e;
        }

        if(!empty($resultSet))
            return $resultSet['0']['0']; // retornamos el valor del select, que esta adentro de un arreglo dentro de otro 
        else
            return false;
    }
    public function update($object)
    {

    }

    public function delete ($number)
    {
        $sql = "DELETE FROM tickets WHERE numberr = :numberr";
        $parameters['numberr'] = $number;

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
		    return new M_Ticket( $p['numberr'], $p['qr'], $p['id_ticket']);
        }, $value);
            
            /* devuelve un arreglo si tiene mas de 1 dato, sino un objeto si es solo 1*/

            return count($resp) > 1 ? $resp : $resp['0'];
    }

}