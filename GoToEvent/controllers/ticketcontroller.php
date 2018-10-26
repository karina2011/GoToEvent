<?php
namespace controllers;

use models\Ticket as Ticket;
use daos\daodb\TicketDao as Dao;
//use assets\phpqrcode\bindings\tcpdf\QRcode; // descomentar para ver el otro error

include( ROOT . 'assets/phpqrcode/qrlib.php'); // para el codigo qr
// https://evilnapsis.com/2018/02/26/crear-codigo-qr-con-php/

/**
 * 
 */
class TicketController
{
	protected $dao;
	
	function __construct()
	{
		$this->dao = Dao::getInstance();
	}

	public function create($number)
	{
		//SE CREA EL OBJETO PARA LUEGO GUARDARLO EN LA BASE DE DATOS
		// creamos un ticket aleatorio 
		$number = rand(1,100000); // numero aleatorio entre 1 y 100000
		$qr = $number . 'png'; // el codigo qr va a ser el numero de ticket
		$content = $number;
		QRcode::png($content,$qr,QR_ECLEVEL_L,10,2); // incluir la libreria para que funcione
		// primer parametro el contenido del qr, segundo parametro el nombre de la iamgen q se va a generar
		$ticket = new Ticket($number,$qr);

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