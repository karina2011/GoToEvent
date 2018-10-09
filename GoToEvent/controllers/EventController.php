<?php 
namespace controllers;
use daos\daoList\ArtistDao as Dao;
use models\Event;
/**
 * 
 */
class EventController
{
	protected $dao;
	
	function __construct()
	{
		$this->dao=Dao::getInstance();
	}

	public function creat($title)
	{
		$event = new Event($title);

		$this->dao->create($event);
	}

	public function readAll()
	{
		$lista = $this->dao->readAll();

		include('views/ViewEvents.php');
	}
}

?>