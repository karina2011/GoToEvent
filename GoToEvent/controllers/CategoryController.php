<?php
namespace controllers;

use models\Category;
use daos\daodb\CategoryDao as Dao;

use controllers\ViewsController as C_View;

class CategoryController
{
	protected $dao;
	private $viewController;

	function __construct()
	{
		$this->dao=Dao::getInstance(); // esto se instancia en el router
		$this->viewController = new C_View;
	}

	public function create($description='')
	{
		$category = new Category($description);

		$this->dao->create($category);

		$this->viewController->viewCategoriesAdmin();
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

	public function read($description)
	{
		$category = $this->dao->read($description);

		return $category;

	}

	public function readCategoriesSet()
	{
		return $this->dao->readCategoriesSet();
	}

	public function readById($id)
    {
        $category = $this->dao->readById($id);

        return $category[0];

    }

	public function delete($description)
	{
		$this->dao->delete($description);

		$this->viewController->viewCategoriesAdmin();
	}


}

 ?>
