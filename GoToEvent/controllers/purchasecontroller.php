<?php 
namespace controllers;

use models\Purchase;
use models\Purchase_line; // ver si es necesario
use models\User; // cliente
use daos\daodb\PurchaseDao as Dao;
use daos\daodb\UserDao as D_User;

/**
 * 
 */
class PurchaseController
{
	protected $dao;
	
	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
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

			require(ROOT . VIEWS . 'Home.php');
		} else {
			echo "No existe el cliente";
			// modificar el require segun lo que se valla a hacer si ingreso mal el email
			require(ROOT . VIEWS . "Home.php");
		}
	}

	public function readAll()
	{
		$list = $this->dao->readAll();

		include(VIEWS . 'viewpurchase.php');
	}

	public function delete($id)
	{
		$this->dao->delete($id);
		$list = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar un evento, al ya haber recorrido todos los eventos, la lista quedaba vacía, por eso hay q volver a leer
		require(ROOT . VIEWS . 'viewpurchase.php');
	}
	
}

?>