<?php
namespace models;

//use assets\phpqrcode\phpqrcode as QRcode;
require_once (ROOT . 'phpqrcode/qrlib.php');  
use daos\daodb\TicketDao as D_Ticket;
use phpqrcode\QRcode as QRcode;
/*https:evilnapsis.com/2018/02/26/crear-codigo-qr-con-php  para crear codigo qrs*/

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
		//$this->qr = $number;
		$this->id_ticket = $daoTicket->getMaxId() + 1; // asignamos el id q le corresponde segun la BD
	}

	public function generateRandomQr(){
		//Agregamos la libreria para genera códigos QR
		 

	
		//Si no existe la carpeta la creamos
		if (!file_exists(DIR_QR))
		mkdir(DIR_QR);

	//Declaramos la ruta y nombre del archivo a generar
		
		$filename = DIR_QR.$this->number.'.png';
		$tamaño = 10; //Tamaño de Pixel
		$level = 'L'; //Precisión Baja
		$framSize = 3; //Tamaño en blanco
		$contenido = "http://codigosdeprogramacion.com"; //Texto
		
			//Enviamos los parametros a la Función para generar código QR 
		QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
		
			//Mostramos la imagen generada
		echo '<img src="'.DIR_QR.basename($filename).'" /><hr/>';  
		$this->qr = $filename;
	}
	public function createNewTicket($ticket)
	{
		$ticket = $this->generateRandomTicket();
		$this->dao->create($ticket);
		$ticket = $this->dao->readLastTicket();
		

		return $ticket;
	}
}
?>
