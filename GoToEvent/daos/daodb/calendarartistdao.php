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

    public function read($id)
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }

    public function readAll()
    {
    	
    }

}

 ?>