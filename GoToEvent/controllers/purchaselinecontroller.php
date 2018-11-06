<?php
namespace controllers;

use models\Purchase;
use models\PurchaseLine;
use models\Ticket;
use daos\daodb\PurchaseLineDao as Dao;
use daos\daodb\EventSquareDao as D_Event_Square;
use daos\daodb\TicketDAo as D_Ticket;

/**
 *
 */
class PurchaseLineController
{
	protected $dao;

	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
    }

	public function create($event_square_id='', $quantity='', $id_purchase='')
	{
		// buscar el event_square en base al id q recibimos a la base de datos de eventos
		$daoEventSquare = D_Event_Square::getInstance();

		$event_square = $daoEventSquare->read($event_square_id);
		$price = $event_square->getPrice();

		$ticket = new Ticket ();
		$ticket->generateRandomTicket(); // generamos un ticket aleatorio
		$daoTicket = D_Ticket::getInstance();
		$daoTicket->create($ticket); // y agregamos el ticket a la base de datos
		// crear el objeto linea de compra para enviarlo a la base de datos
		$purchaseline = new Purchaseline($price,$quantity,$event_square, $ticket);

		$this->dao->create($purchaseline,$id_purchase); // el id de compra es para relacionar cada linea con su respectiva compra en la BD
		// pero en el objeto no se van a relacionar con nada // al guardar compra en su bd, vamos guardando tambien sus lineas de compras en la bd de lineas de c.
		require(ROOT . VIEWS . 'Home.php');

	}

	public function readAll()
	{

		$list = $this->dao->readAll();

		return $list;
	}

	public function delete($id)
	{
		$this->dao->delete($id);
		$list = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar una linea de compra, al ya haber recorrido todos las lineas de compra, la lista quedaba vacía, por eso hay q volver a leer
		require(ROOT . VIEWS . 'viewpurchaselines.php');
	}

}

?>
