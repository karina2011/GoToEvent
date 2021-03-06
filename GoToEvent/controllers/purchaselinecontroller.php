<?php
namespace controllers;

use models\Purchase;
use models\PurchaseLine as M_Purchase_line;
use models\Ticket as M_Ticket;
use daos\daodb\PurchaseLineDao as Dao;
use daos\daodb\EventSquareDao as D_Event_Square;
use daos\daodb\TicketDAo as D_Ticket;

use controllers\ViewsController as C_View;
use controllers\EventSquareController as C_Event_square;

/**
 *
 */
class PurchaseLineController
{
	protected $dao;
	private $viewController;

	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
        $this->viewController = new C_View;
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

		$this->viewController->index();

	}

	public function createByObject($purchase_line)
	{
			$this->dao->create($purchase_line,$purchase_line->getPurchaseId());
	}

	public function readAll()
	{

		$list = $this->dao->readAll();

		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;
	}

	public function delete($id)
	{
		$this->dao->delete($id);
		$list = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar una linea de compra, al ya haber recorrido todos las lineas de compra, la lista quedaba vacía, por eso hay q volver a leer

		$this->viewController->viewPurchaseLinesAdmin();
	}

	public function createPurchaseLine($id_event_square='',$number='')
	{
			if(!isset($_SESSION['carrito']))
			{
				$_SESSION['carrito'] = array();
			}

			$eventSquareController = new C_Event_square;
			$event_square = $eventSquareController->readEventSquareById($id_event_square);
			if($event_square->getRemainder() >= $number)
			{
					/*$ticket = new M_Ticket();
				
					$ticket = $ticket->generateRandomTicket();*/
					$purchaseline = new M_Purchase_line($event_square->getPrice(),$number,$event_square);
					$_SESSION['carrito'][] = $purchaseline;
					$this->viewController->index();
					echo "<script>alert('Su compra se agrego al carrito.')</script>";
			} else {
				$this->viewController->index();
				echo "<script>alert('No quedan plazas disponibles')</script>";
			}

	}

	public function deleteLine()
	{
		if($_GET)
		{
			/*echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";*/
			$posicion = $_GET['posicion'];
			unset($_SESSION['carrito'][$posicion]);
			$_SESSION['carrito']=array_values($_SESSION['carrito']);
		}
		$this->viewController->shoppingCart();
	}

}

?>
