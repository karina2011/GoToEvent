<?php
namespace controllers;

use models\Ticket as Ticket;
use daos\daodb\TicketDao as Dao;


/**
 * 
 */
class TicketController // fijarse si esta controladora es necesaria - Allan
{
	protected $dao;
	
	function __construct()
	{
		$this->dao = Dao::getInstance();
	}

	public function create()
	{
		//SE CREA EL OBJETO PARA LUEGO GUARDARLO EN LA BASE DE DATOS

		$ticket = new Ticket(); // crea un ticket vacio
		$ticket->generateRandomTicket(); // creamos un ticket aleatorio

		//GUARDA EL OBJETO EN LA BASE DE DATOS

		$this->dao->create($ticket);

		//INCLUYE LA VISTA PRINCIPAL

		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		//SE GUARDA EN LA LISTA TODOS LOS TICKETS QUE DEVUELVE LA BASE DE DATOS

		$list = $this->dao->readAll();

		//INCLUYE LA VISTA DONDE SE MUESTRA LO LEIDO

		require(ROOT . VIEWS . 'viewtickets.php');

		//FALTA REALIZAR LA VISTA DONDE SE MUESTRAN LOS TICKETS
	}

	public function read($number)
	{
		//GUARDA EN TICKET, EL OBJETO QUE COINCIDE CON EL NUMBER RECIBIDO POR PARAMETRO

		$ticket = $this->dao->read($number);

		//FALTA HACER LA VISTA QUE MUESTRE EL TICKET QUE SE BUSCO
	}

	public function delete($number)
	{
		//SE BORRA EL TICKET QUE COINCIDA CON EL NUMBERO RECIBIDO POR PARAMETRO

		$this->dao->delete($number);

		//SE INCLUYE LA VISTA PRINCIPAL PARA QUE EL USUARIO PUEDA SEGUIR NAVEGANDO EN LA PAGINA WEB

		require(ROOT . VIEWS . 'Home.php');
	}
}