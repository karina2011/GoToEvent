<?php
namespace controllers;

use models\Category;
use daos\daodb\CategoryDao as Dao;
/**
 *
 */
class CategoryController
{
	protected $dao;
	function __construct()
	{
		$this->dao=Dao::getInstance(); // esto se instancia en el router
	}

	public function create($description='')
	{
		$category = new Category($description);

		$this->dao->create($category);

		require(ROOT . VIEWS . 'categoriesAdmin.php');
	}

	public function readAll()
	{
		$list = $this->dao->readAll();

		return $list;
		//falta incluir la vista que muestre todos las categorias

		
	}

	public function read($description)
	{
		$category = $this->dao->read($description);

		//flata mostrar la categoria que devuelve el dao
	}

	public function delete($description)
	{
		$this->dao->delete($description);

		require(ROOT . VIEWS . 'categoriesAdmin.php');
	}


}

 ?>
