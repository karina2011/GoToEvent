<?php namespace daos\daobd;

    use \PDO as PDO;
    use \Exception as Exception;

    class Connection
    {
        
        public function getConnection()
        {
            try
            {
                $conexion = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $conexion;
        }

    }
?>