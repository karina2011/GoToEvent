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

		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list; 
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;

		
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
