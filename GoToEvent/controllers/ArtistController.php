<?php
namespace controllers;
//use daos\daoList\ArtistDao as Dao;
use models\Artist;
use daos\daobd\ArtistDao as Dao;

class ArtistController
{
    protected $dao; // es una instancia de la Dao lista, para poder comunicarme con ella

    public function __construct()
    {
        $this->dao=Dao::getInstance(); // esto se instancia en el router
    }

    public function index() // funcion por defecto de cada controladora
    {
        include(BASE . VIEWS . "Home.php");
    }

    public function store($nombre,$apellido,$dni)
    {
        $artist = new Artist($dni,$nombre,$apellido);

        //$flag = $this->dao->create($artist);
        $this->dao->create($artist);

        /*if($flag){
            echo "Artista creado" . "<br><br>";
        } else {
            echo "No se pudo crear el artista" . "<br><br>";
        }*/

        require(ROOT . VIEWS . 'Home.php');

    }

    public function getStore()
    {
        $lista = $this->dao->readAll();
        //var_dump($lista);
        include(VIEWS . "ViewArtistas.php");
    }

    public function delete($dni)
    {
        
        $this->dao->delete($dni);

        require(ROOT . VIEWS . 'Home.php');
    }


}
