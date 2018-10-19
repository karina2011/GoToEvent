<?php

namespace daos\daodb;

use models\User as M_User;
use daos\daodb\connection as Connection;
use PDOException;
/**
 * 
 */
class UserDao extends Singleton implements \interfaces\Crud
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = null;
    }

    public function create($user)
    {
    	// Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO users (name, last_name, dni, email, type) VALUES (:name, :last_name, :dni, :email, :type)";

        $parameters['name'] = $user->getName();
        $parameters['last_name'] = $user->getLastName();
        $parameters['dni'] = $user->getDni();
        $parameters['email'] = $user->getEmail();
        $parameters['type'] = $user->getEmail();


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
        $sql = "SELECT * FROM users";

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
        $sql = "SELECT * FROM users where email = :email";

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


    public function update ($email)
    {

    }

    public function delete ($email)
    {
        $sql = "DELETE FROM users WHERE email = :email";
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
		    return new M_User( $p['name'], $p['last_name'], $p['email'], $p['dni'],$p['type'], $p['id_user']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }

}