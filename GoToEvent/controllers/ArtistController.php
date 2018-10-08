<?php
namespace controllers;
use daos\daoList\ArtistDao as Dao;
use models\Artist;

class ArtistController
{
    protected $dao; // es una instancia de la Dao lista, para poder comunicarme con ella

    public function __construct()
    {
        $this->dao=Dao::getInstance(); // esto se instancia en el router
    }

    public function index() // funcion por defecto de cada controladora
    {
        include("../views/Home.php");
    }

    public function store($nombre, $apellido)
    {
        $artist = new Artist($nombre,$apellido);

        $this->dao->create($artist);

    }

    public function getStore()
    {
        $lista = $this->dao->readAll();
        //var_dump($lista);
        include("views/ViewArtistas.php");
    }


}
