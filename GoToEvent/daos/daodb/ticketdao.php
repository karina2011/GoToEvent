<?php 
namespace daos\daodb;

use models\Ticket as M_Ticket;
use daos\daobd\connection as Connection;
use PDOException

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

    public function read ($number)
    {
        $sql = "SELECT * FROM artists where numberr = :numberr";

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

    public function update()
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

   protected function mapear($value) {

		$value = is_array($value) ? $value : [];
        
		$resp = array_map(function($p){
		    return new M_Artist( $p['numberr'], $p['qr'], $p['id_ticket']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
    }

}