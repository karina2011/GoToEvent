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
		$purchase_lines = $_SESSION['carrito'];
		$purchase = new M_Purchase(now(),$_SESSION['user'],$purchase_lines);
		$this->dao->create($purchase);
		$purchase = $this->dao->readLast();
		foreach ($purchase_lines as $key => $purchase_line) {
				$ticket = new M_Ticket();
				$ticket = $ticket->generateRandomTicket();
				$purchase_line->setTicket($ticket);
				$purchase_line->setPurchase($purchase);

		}
	}

}

?>
