<?php
namespace controllers;

use models\Ticket as Ticket;
use daos\daodb\TicketDao as Dao;

use controllers\ViewsController as C_View;

/**
 *
 */
class TicketController // fijarse si esta controladora es necesaria - Allan
{
	protected $dao;
	private $viewController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->viewController = new C_View;
	}

	public function create()
	{
		//SE CREA EL OBJETO PARA LUEGO GUARDARLO EN LA BASE DE DATOS

		$ticket = new Ticket(); // crea un ticket vacio
		$ticket->generateRandomTicket(); // creamos un ticket aleatorio

		//GUARDA EL OBJETO EN LA BASE DE DATOS

		$this->dao->create($ticket);

		// incluye la vista admin de ticket
		//$this->viewController->viewTicketsAdmin();
	}

	// devuelve un arreglo con los objetos dentro o un arreglo vacio en caso de no haber nada en la BD
	public function readAll()
	{
		//SE GUARDA EN LA LISTA TODOS LOS TICKETS QUE DEVUELVE LA BASE DE DATOS

		$list = $this->dao->readAll();
		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		//SOLUCIONADO, HACER ESTO EN LAS DEMAS CONTROLADORAS
		return $list;
	}

	public function read($number)
	{
		//GUARDA EN TICKET, EL OBJETO QUE COINCIDE CON EL NUMBER RECIBIDO POR PARAMETRO

		$ticket = $this->dao->read($number);

		//FALTA HACER LA VISTA QUE MUESTRE EL TICKET QUE SE BUSCO
	}

	public function readLast()
	{
		return $this->dao->readLast();
	}

	public function delete($number)
	{
		//SE BORRA EL TICKET QUE COINCIDA CON EL NUMBERO RECIBIDO POR PARAMETRO

		$this->dao->delete($number);

		//SE INCLUYE LA VISTA PRINCIPAL PARA QUE EL USUARIO PUEDA SEGUIR NAVEGANDO EN LA PAGINA WEB

		$this->viewController->viewTicketsAdmin();

	}
}
