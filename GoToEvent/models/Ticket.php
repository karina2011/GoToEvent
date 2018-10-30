<?php
namespace models;

use daos\daodb\TicketDao as D_Ticket;
// https://evilnapsis.com/2018/02/26/crear-codigo-qr-con-php/ // para crear codigo qrs

class Ticket
{
	
	private $number;
	private $qr;
	private $id_ticket;

	function __construct($number='', $qr='', $id_ticket='')
	{
		$this->number = $number; // generar numero validando a la base de datos
		$this->qr = $qr;
		$this->id_ticket = $id_ticket;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getQr()
	{
		return $this->qr;
	}

	public function getId()
	{
		return $this->id_ticket;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function setQr($qr)
	{
		$this->qr = $qr;
	}

	public function generateRandomTicket(){
		$flag = true; 
		$i = 0;
		$daoTicket = D_Ticket::getInstance();
		while ($flag == true && $i < 100000){

			$number = rand(1,100000); // numero aleatorio entre 1 y 100000

			$flag = $daoTicket->read($number); // si devuelve false, significa q el numero no existe en la BD

			$i ++; // por si algun dia llegamos a los 100mil tickets, q no se quede en loop infinito 

		}

		$this->number = $number;
		$this->qr = $number;
		$this->id_ticket = $daoTicket->getMaxId() + 1; // asignamos el id q le corresponde segun la BD
	}
}
?>