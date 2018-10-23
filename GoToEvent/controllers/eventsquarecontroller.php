<?php 

namespace controllers;
//use daos\daoList\ArtistDao as Dao;
use models\Event_square;
use models\Square_type;
use daos\daodb\EventSquareDao as Dao;
use daos\daodb\SquareTypeDao as DaoSquareType;

class EventSquareController
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

    public function create($price='',$availble_quantity='',$remainder='',$square_type='')
    {
        // $squaretype vine en formato de id, y hay q pasarlo a objeto
        $daoSquareType = DaoSquareType::getInstance();

        $square_type = $daoSquareType->readById($square_type);
        // hay q hacer new porq devuelve en forma de arreglo
        $square_type = new Square_type($square_type[0]->getDescription(),$square_type[0]->getId());


        $event_square = new Event_square($price,$availble_quantity,$remainder,$square_type);

        //$flag = $this->dao->create($artist);
        $this->dao->create($event_square);

        /*if($flag){
            echo "Artista creado" . "<br><br>";
        } else {
            echo "No se pudo crear el artista" . "<br><br>";
        }*/

        require(ROOT . VIEWS . 'Home.php');

    }

    public function readAll()
    {
        $list = $this->dao->readAll();
        
        require (ROOT . VIEWS . "vieweventsquares.php");
    }

    public function delete($dni)
    {

        $this->dao->delete($dni);

        require(ROOT . VIEWS . 'Home.php');
    }



} ?>