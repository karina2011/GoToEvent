<?php 
namespace daos\daodb;

use PDOException;
use daos\daodb\connection as Connection;

/**
 * 
 */
class CalendarArtistDao extends Singleton implements \interfaces\Crud
{
	
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

    public function create($ids_calendar_artist)
    {
    	$id_calendar = $ids_calendar_artist['0'];
        $id_artist = $ids_calendar_artist['1'];
         echo "id_   ".$ids_calendar_artist['1'];
    	$sql = "INSERT INTO calendars_x_artists (id_calendar,id_artist) VALUES (:id_calendar, :id_artist)";

        $parameters['id_calendar'] = $id_calendar;
        $parameters['id_artist'] = $id_artist;

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

    public function read($id_calendar)
    {
        $sql = "SELECT * FROM calendars_x_artists where id_calendar = :id_calendar";

        $parameters['id_calendar'] = $id_calendar;

        try 
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
            /*echo "esto es resulset";
            echo "<pre>";
            var_dump($resultSet);
            echo "</pre>";*/

        } 
        catch(PDOException $e) 
        {
            echo $e;
        }

        if(isset($resultSet))
            return $resultSet;
        else
            return false;
    }
    

    public function update($id)
    {

    }

    public function delete($id)
    {

    }

    public function readAll()
    {
        $sql = "SELECT * FROM calendars_x_artists";

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
            return $resultSet;
        else
            return false;
    }

}

 ?>