<?php

namespace daos\daodb;

use models\Customer as M_Customer;
use daos\daobd\connection as Connection;
use PDOException;
/**
 * 
 */
class CustomerDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($customer)
    {
    	// Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO customers (name, last_name, dni, email, rol) VALUES (:name, :last_name, :dni, :email, :rol)";

        $parameters['name'] = $customer->getName();
        $parameters['last_name'] = $customer->getLastName();
        $parameters['dni'] = $customer->getDni();
        $parameters['email'] = $customer->getEmail();
        $parameters['rol'] = $customer->getRol();

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
        $sql = "SELECT * FROM customers";

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

    public function read ($email)
    {
        $sql = "SELECT * FROM customer where email = :email";

        $parameters['email'] = $email;

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

    public function delete ($email)
    {
        $sql = "DELETE FROM customers WHERE email = :email";
        $parameters['email'] = $email;

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
		    return new M_Artist( $p['name'], $p['last_name'], $p['email'], $p['dni'], $p['rol'], $p['id_customer']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }

}