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

	public function creat($title='')
	{

		$event = new Event($title,1);

		$this->dao->create($event);

		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		$lista = $this->dao->readAll();

		include(VIEWS . 'ViewEvents.php');
	}

	public function delete($title)
	{
		$this->dao->delete($title);

		require(ROOT . VIEWS . 'Home.php');
	}
	
}

?>