<?php
namespace daos\daobd;

use models\Event as M_Event;
use daos\daobd\connection as Connection;
use PDOException;

class EventDao extends Singleton implements \interfaces\Crud
{
    private $object;
    public function __construct()
    {
        $this->object = null;
    }
    public function getEvent()
    {
        return $this->object;
    }
    public function setEvent($object)
    {
        $this->object = $object;
    }
    public function create($event)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO events (title,id_category) VALUES (:title, :category)";


		// creo el objeto conexion
		//$obj_pdo = new Connection();


		// Conecto a la base de datos.
		try {
			//$conexion = $obj_pdo->conectar();

            $modelo = new Connection();
            $conexion = $modelo->getConnection();

			// Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
			$sentencia = $conexion->prepare($sql);

			// Reemplazo los marcadores de parametro por los valores reales utilizando el método bindParam().
			$oneTitle = $envet->getTitle();
            $oneCategory = $event->getCategory();
				
            $sentencia->bindParam(":title", $oneTitle);
            $sentencia->bindParam(":category", $oneCategory);

			// Ejecuto la sentencia.
			return $sentencia->execute();

        } 
        catch(PDOException $Exception) {

			//throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
            throw new Exception('Error: ' . $e->getMessage());

		}
    }

    public function readAll()
    {
        $sql = "SELECT * FROM events";

       // $obj_pdo = new Connection();

        try {
           // $conexion = $obj_pdo->conectar();
            $modelo = new Connection();
            $conexion = $modelo->getConnection();

			// Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
			$sentencia = $conexion->prepare($sql);

            $sentencia->execute();

            $array = [];
            while($row = $sentencia->fetch()) {
                $array[] = $row;
            }
            
            return $this->mapear($array);

        } catch(PDOException $Exception) {

			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

		}
    }

    public function read ($idEvent)
    {
        $sql = "SELECT * FROM artistas where id_event = :idEvent";

        try {
            $modelo = new Connection();
            $conexion = $modelo->getConnection();
             // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(":idEvent", $idEvent);

             $sentencia->execute();

             $array = [];
             while($row = $sentencia->fetch()) {
                  $array[] = $row;
             }

             if($sentencia->rowCount() > 0)
                  return $this->mapear($array);
             else
                  return false;

        } catch(PDOException $Exception) {

         throw new \MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    }

    public function update ($id)
    {

    }

    public function delete ($idEvent)
    {
        $sql = "DELETE FROM events WHERE id_event = :idEvent";

        //$obj_pdo = new Conexion();

        try {
            $modelo = new Connection();
            $conexion = $modelo->getConnection();
            
            // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(":idEvent", $idEvent);

            $sentencia->execute();


        } catch(PDOException $Exception) {

            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
   }

    

    /**
    * Transforma el listado de usuario en
    * objetos de la clase Usuario
	*
	* @param  Array $gente Listado de personas a transformar
	*/
	protected function mapear($value) {

		$value = is_array($value) ? $value : [];
        
		$resp = array_map(function($p){
		    return new M_Event( $p['title'], $p['category'], $p['id_event']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
