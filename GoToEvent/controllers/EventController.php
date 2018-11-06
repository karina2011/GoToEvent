<?php
namespace controllers;
//use daos\daoList\EventDao as Dao;
use models\Event;
use models\Category;
use daos\daodb\EventDao as Dao;
use daos\daodb\CategoryDao as D_Category;
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

	public function create($title='',$id_category='')
	{
		$daocategory = D_Category::getInstance();

		$category = $daocategory->readById($id_category);

		$event = new Event($title,$category['0']);

		$this->dao->create($event);

		require(ROOT . VIEWS . 'eventsAdmin.php');
	}

	public function readAll()
	{
		$list = $this->dao->readAll();

		return $list;
	}

	public function delete($title)
	{
		$this->dao->delete($title);

		require(ROOT . VIEWS . 'eventsAdmin.php');
	}

}

?>
