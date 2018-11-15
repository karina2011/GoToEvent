<?php
namespace controllers;
//use daos\daoList\EventDao as Dao;
use models\Event;
use models\Category;
use controllers\FileController;
use daos\daodb\EventDao as Dao;
use daos\daodb\CategoryDao as D_Category;

use controllers\ViewsController as C_View;

class EventController
{
	protected $dao;
	private $viewController;

	public function __construct()
    {
        $this->dao = Dao::getInstance(); // esto se instancia en el router
        $this->viewController = new C_View;
    }

	public function create($title='',$id_category='', $file= '')
	{

		$fileController = new FileController();

		$resp = $fileController->upload($file,'eventimg');
		//echo "aca pasa algo: ".$resp;
		if($resp != null){
			$daocategory = D_Category::getInstance();

			$category = $daocategory->readById($id_category);

			$event = new Event($title,$category['0'],$resp);

			$this->dao->create($event);

			$this->viewController->viewEventsAdmin();

		} else {
			$this->viewController->viewEventsAdmin();
			echo "<script>alert('Ocurrio un error al cargar la imagen')</script>";
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

	public function delete($title)
	{
		$this->dao->delete($title);

		require(ROOT . VIEWS . 'eventsAdmin.php');
	}

}

?>
