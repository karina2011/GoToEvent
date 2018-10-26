<?php 
namespace controllers;

use models\Purchase;
use models\PurchaseLine;
use models\Ticket;
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

	public function create($date='',$userEmail='')
	{	
		$daoUser = D_User::getInstance();

		$customer = $daoUser->read($userEmail);

		if($customer){

			$name = $customer[0]->getName();
		 	$last_name = $customer[0]->getLastName();
		 	$email = $customer[0]->getEmail();
		 	$dni = $customer[0]->getDni();
		 	$type = $customer[0]->getType();
		 	$id_user =  $customer[0]->getId();

		 	$customer = new User($name,$last_name,$email,$dni,$type,$id_user);

			$purchase = new Purchase($date, $customer); 

			$this->dao->create($purchase);

			require(ROOT . VIEWS . 'Home.php');
		} else {
			echo "No exsiste el clinete";
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