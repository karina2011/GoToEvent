<?php

namespace controllers;

use models\Customer as Customer;
use daos\daodb\CustomerDao as Dao;

/**
 * 
 */
class CustomerController
{	
	protected $dao;
	
	function __construct()
	{
		$this->dao = Dao::getInstance();
	}

	public function create($name,$last_name,$email,$dni,$id_purchase,$id_customer)
	{
		//crea el objeto customer para luego agregarlo a la base de datos

		$customer = new Customer($name,$last_name,$email,$dni,$id_purchase);

		//llama al metodo del dao para guardarlo en la base de datos

		$this->dao->create();

		//luego de guardarlo en la base de datos se muetra el inicio de la pagina
		require(ROOT . VIEWS . 'Home.php');
	}

	public function readAll()
	{
		//guarda todos los customer de la base de datos en la variable list

		$list = $this->dao->readAll();

		//incluye la vista que muestra todos los customer

		//falta hacer la vista para mostrarlos

	}

	public function read($email)
	{
		//DEVUELVE EL CUSTOMER CON ESE EMAIL EN CASO DE EXSISTIR

		$customer = $this->dao->read($email);

		//INCLUYE LA VISTA DONDE SE MUESTRA EL CUSTOMER

		//FALTA HACER LA VISTA 

	}

	public function delete($email)
	{
		//BORRA EL CUSTOMER QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS

		$this->dao->delete();

		//INCLUYE LA VISTA PRINCIPAL
		
		require(ROOT . VIEWS . 'Home.php');
	}
}