<?php
namespace daos\daobd;

use models\Artist as M_Artist;
use daos\daobd\connection as Connection;
use PDOException;

class ArtistDao extends Singleton implements \interfaces\Crud
{
    private $object;
    public function __construct()
    {
        $this->object = null;
    }
    public function getArtist()
    {
        return object;
    }
    public function setArtist($object)
    {
        $this->object = $object;
    }
    public function create($artist)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada

		$sql = "INSERT INTO artistas (name, last_name, dni) VALUES (:name, :last_name, :dni)";


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
			$oneName = $artist->getName();
            $oneLastName = $artist->getLastName();
			$oneDni = $artist->getDni();
				
            $sentencia->bindParam(":name", $oneName);
            $sentencia->bindParam(":last_name", $oneLastName);
			$sentencia->bindParam(":dni", $oneDni);

			// Ejecuto la sentencia.
			return $sentencia->execute();

        } 
        catch(PDOException $Exception) {

			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

		}
    }

    public function readAll()
    {
        $sql = "SELECT * FROM artistas";

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

    public function read ($idArtist)
    {
        $sql = "SELECT * FROM artistas where id_artist = :idArtist";

        try {
            $modelo = new Connection();
            $conexion = $modelo->getConnection();
             // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(":idArtist", $idArtist);

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

    public function delete ($idArtist)
    {
        $sql = "DELETE FROM artistas WHERE dni = :idArtist";

        //$obj_pdo = new Conexion();

        try {
            $modelo = new Connection();
            $conexion = $modelo->getConnection();
            
            // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(":idArtist", $idArtist);

            $sentencia->execute();


        } catch(PDOException $Exception) {

            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
   }

    public function checkDni($dni){
       
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
		    return new M_Artist( $p['dni'], $p['name'], $p['last_name'], $p['id_artist']);
        }, $value);
            
            /* devuelve un arreglo si tiene datos y sino devuelve nulo*/

            return count($resp) > 0 ? $resp : null;
     }
}
