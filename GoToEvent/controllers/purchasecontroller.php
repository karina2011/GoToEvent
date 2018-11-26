<?php
namespace controllers;

use models\Purchase as M_Purchase;
use models\Purchase_line; // ver si es necesario
use models\User; // cliente
use models\Ticket as M_Ticket;
use daos\daodb\PurchaseDao as Dao;
use daos\daodb\UserDao as D_User;

use controllers\ViewsController as C_View;
use controllers\PurchaseLineController as C_PurchaseLine;
use controllers\TicketController as C_Ticket;
use controllers\EventSquareController as C_Event_square;
/**
 *
 */
class PurchaseController
{
	protected $dao;
	private $viewController;

	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
        $this->viewController = new C_View;
    }

	public function create($userEmail='', $purchaselines='')
	{
		var_dump($purchaselines);
		//Pensar bien esto, primero fijarse si hay un usuario en session y extraer el usuario de ahi

		$daoUser = D_User::getInstance(); // una vez hecho lo de session con usuarios, se saca esto

		$customer = $daoUser->read($userEmail);

		if($customer){
			$price = 0;
			foreach ($purchaselines as $key => $purchaseline) {
				$price += $purchaseline->getPrice() * $purchaseline->getQuantity();
			}

			$purchase = new Purchase(strftime( "%Y-%m-%d", time()), $customer, $purchaselines, $price); // pasamos la fecha actual como parametro

			$this->dao->create($purchase);

			$this->viewController->viewPurchasesAdmin();
		} else {
			echo "No existe el cliente";
			// modificar el require segun lo que se valla a hacer si ingreso mal el email
			$this->viewController->viewPurchasesAdmin();
		}
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
		// despues de borrar un evento, al ya haber recorrido todos los eventos, la lista quedaba vacía, por eso hay q volver a leer
		$this->viewController->viewPurchasesAdmin();
	}

	public function endPurhcase()
	{
		if(!empty($_SESSION['carrito'])){
			/*echo "<pre>";
			var_dump($_SESSION['carrito']);
			echo "</pre>";*/
				if(isset($_SESSION['user'])){
					$purchase_lines = $_SESSION['carrito'];
					$fecha=strftime( "%Y-%m-%d-%H-%M-%S", time() );
					$purchase = new M_Purchase($fecha,$_SESSION['user'],$purchase_lines);
					$this->dao->create($purchase);
					$purchase = $this->dao->readLast();
					$purchaseLineController = new C_PurchaseLine;
					$ticketController = new C_Ticket;
					foreach ($purchase_lines as $key => $purchase_line) {
							$ticket = new M_Ticket();
							$ticketController->create($ticket);
							$ticket = $ticketController->readLast();
							$purchase_line->setTicket($ticket);
							$purchase_line->setPurchase($purchase);

							/*
							Esto lo que hace es restarle a la plaza de evento
							las cantidad de entradas que compraron
							*/
							$available_quantity = $purchase_line->getAvailableQuantity();
							$available_quantity = $available_quantity - $purchase_line->getQuantity();
							$eventsquareController = new C_Event_square();
							$eventsquareController->update($purchase_line->getEventSquare(),$available_quantity);




							$purchaseLineController->createByObject($purchase_line);
					}
					$_SESSION['carrito'] = array();
					$this->viewController->index();
					echo "<script>alert('Su compra se realizo correctamente')</script>";

				} else {
					$this->viewController->index();
					echo "<script>alert('Por favor primero ingrese a su cuenta. Luego realice la compra')</script>";
				}

		} else {
			$this->viewController->index();
			echo "<script>alert('Antes de comprar debe de tener articulos en su carrito')</script>";
		}

	}

	public function getPurchasesByUser($user){

		$list = $this->dao->readAllByUser($user->getId());

		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;

	}

}

?>
