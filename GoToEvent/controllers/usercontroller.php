<?php

namespace controllers;

use models\User as User;
use daos\daodb\UserDao as Dao;

/**
 * 
 */
class UserController
{	
	protected $dao;
	
	function __construct()
	{
		$this->dao = Dao::getInstance();
	}

	public function create($name,$last_name,$email,$dni,$type)
	{
		//crea el objeto user para luego agregarlo a la base de datos

		$user = new User($name,$last_name,$email,$dni,$type);

		//llama al metodo del dao para guardarlo en la base de datos

		$this->dao->create($user);

		//luego de guardarlo en la base de datos se muetra el inicio de la pagina
		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		//guarda todos los user de la base de datos en la variable list

		$list = $this->dao->readAll();
		
		include(VIEWS . 'viewusers.php');

		//falta hacer la vista para mostrarlos

	}

	public function read($email)
	{
		//DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR

		$user = $this->dao->read($email);

		//INCLUYE LA VISTA DONDE SE MUESTRA EL user

		//FALTA HACER LA VISTA 

	}

	public function delete($email)
	{
		//BORRA EL user QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		
		$this->dao->delete($email);

		//INCLUYE LA VISTA PRINCIPAL
		
		require(ROOT . VIEWS . 'Home.php');
	}
}