<?php 
namespace controllers;
//use daos\daoList\EventDao as Dao;
use models\Event;
use daos\daobd\EventDao as Dao;
/**
 * 
 */
class EventController
{
	protected $dao;
	
	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
    }

	public function creat($title='',$id_event='',$category='')
	{
		
		$event = new Event($title,$id_event,"prueba"); // modificar "prueba", agregar categoria al forumlario al crear evento

		$this->dao->create($event);

		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		$lista = $this->dao->readAll();

		include(VIEWS . 'ViewEvents.php');
	}

	public function delete($idEvent)
	{
		$this->dao->delete($idEvent);
		$lista = $this->dao->readAll(); // agregue esto como solucion temporal al problema de borrado // si no da problemas se deja
		// despues de borrar un evento, al ya haber recorrido todos los eventos, la lista quedaba vacía, por eso hay q volver a leer
		require(ROOT . VIEWS . 'ViewEvents.php');
	}
	
}

?>