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

		require(ROOT . VIEWS . 'ticketsAdmin.php');
	}

	// devuelve un arreglo con los objetos dentro o un arreglo vacio en caso de no haber nada en la BD
	public function readAll()
	{
		//SE GUARDA EN LA LISTA TODOS LOS TICKETS QUE DEVUELVE LA BASE DE DATOS

		$list = $this->dao->readAll();
		if (!is_array($list) && $list != false){
			$array[] = $list; 
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto
		}
		// REVISAR ESTO YA QUE AL NO HABER DATOS EN BD, DEVUELVE UN FALSE , Y ESTARIAMOS TRABAJANDO SOBRE UN FALSE
		//SOLUCIONAR! // PARECE Q YA ESTA SOLUCIONADO
		return $list;
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

		require(ROOT . VIEWS . 'ticketsAdmin.php');
	}
}