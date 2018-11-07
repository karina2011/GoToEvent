<?php
namespace controllers;
//use daos\daoList\EventDao as Dao;
use models\Event;
use models\Category;
use controllers\FileController;
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

	public function create($title='',$id_category='', $file= '')
	{

		$fileController = new FileController();

		$resp = $fileController->upload($file,'event');

		if($resp){
			$daocategory = D_Category::getInstance();

			$category = $daocategory->readById($id_category);

			$event = new Event($title,$category['0']);

			$this->dao->create($event);

		} else {
			echo "<script>alert('Ocurrio un error')</script>";
		}

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
