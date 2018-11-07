<?php
namespace controllers;

use models\EventPlace as Event_place;
use daos\daodb\EventPlaceDao as Dao;

/**
 * 
 */
class EventPlaceController 
{
    protected $dao; // es una instancia de la Dao lista, para poder comunicarme con ella

    public function __construct()
    {
        $this->dao=Dao::getInstance(); // esto se instancia en el router
    }

    public function create($description,$capacity)
    {
    	//SE CREA EL OBJETO PARA LUEGO AGREGARLO A LA BASE DE DATOS

    	$event_place = new Event_place($capacity, $description);

    	//SE GUARDA EL OBJETO CREADO ANTERIORMENTE EN LA BASE DE DATOS

    	$this->dao->create($event_place);

    	//SE INCLUYE LA VISTA PRINCIPAL PARA PODER SEGUIR NAVEGANDO POR LA WEB

    	require(ROOT . VIEWS . 'eventplacesadmin.php');
    }

    public function readAll()
    {
    	//SE GUARDA EN LA VARIABLE LISTA TODO LO QUE DEVUELVE LA CONSULTA A LA BASE DE DATOS

    	$list = $this->dao->readAll();

        return $list;
    }

    public function read($description)
    {
    	//SE GUARDA EN LA VARIABLE LO QUE DEVUELVE LA CONSULTA A LA BASE DE DATOS

    	$object = $this->dao->read($description);

    	//VISTA EN LA CUAL SE MUESTRA LO LEIDO

    	//FALTA REALIZAR LA VISTA EN LA CUAL SE MUESTRA LO ANTERIOR
    }

    public function delete($description)
    {
    	//SE BORRA DE LA BASE DE DATOS EL REGISTRO CON EL QUE COINCIDA LA DESCRIPCION RECIBIDA POR PARAMETRO

    	$this->dao->delete($description);

    	//SE INCLUYE LA VISTA PRINCIPAL PARA PODER SEGUIR NAVEGANDO POR LA PAGINA WEB

    	require(ROOT . VIEWS . 'eventplacesadmin.php');
    }
}