<?php
namespace controllers;
//use daos\daoList\ArtistDao as Dao;
use models\Artist;
use daos\daodb\ArtistDao as Dao;

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

    public function create($nombre,$apellido,$dni)
    {
        $artist = new Artist($dni,$nombre,$apellido);

        $this->dao->create($artist);

        require(ROOT . VIEWS . 'artistsAdmin.php');

    }

    public function readAll()
    {
        $list = $this->dao->readAll();

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list; 
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }
        return $list;

    }

    public function delete($dni)
    {
        $this->dao->delete($dni);

        require(ROOT . VIEWS . 'artistsAdmin.php');
    }



}
