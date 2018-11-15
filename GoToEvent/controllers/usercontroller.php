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

	public function create($name,$last_name,$email,$dni,$pass,$type='')
	{
		if(!empty($type)){
			//crea el objeto user para luego agregarlo a la base de datos

			$user = new User($name,$last_name,$email,$dni,$type,$pass);

			//llama al metodo del dao para guardarlo en la base de datos

			$this->dao->create($user);

			//luego de guardarlo en la base de datos se muetra el inicio de la pagina
			require(ROOT . VIEWS . 'usersAdmin.php');}
		else {
			//crea el objeto user para luego agregarlo a la base de datos
			$type='cliente';
			$user = new User($name,$last_name,$email,$dni,$type,$pass);

			//llama al metodo del dao para guardarlo en la base de datos

			$this->dao->create($user);

			//luego de guardarlo en la base de datos se muetra el inicio de la pagina
			require(ROOT . VIEWS . 'Home.php');
		}
	}



	public function readAll()
	{
		//guarda todos los user de la base de datos en la variable list

		$list = $this->dao->readAll();
		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;


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

		require(ROOT . VIEWS . 'usersAdmin.php');
	}

	public function login ($email='', $pass='')
	{
		$user = $this->dao->read($email);

		if($user)
		{
			if($user->getPass() == $pass)
			{
				$this->setSession($user);
				require(ROOT . VIEWS . 'Home.php');

			} else {
				require(ROOT . VIEWS . 'login.php');
				echo "<script> alert('Contraseña Incorrecta');</script>";
			}
		} else {
			require(ROOT . VIEWS . 'login.php');
			echo "<script> alert('Usuario Incorrecto');</script>";
		}

	}

	public function checkSession ()
	{
		if (session_status() == PHP_SESSION_NONE)
            session_start();

        if(isset($_SESSION['user'])) {

            $user = $this->dao->read($_SESSION['user']->getEmail());

            if($user->getPass() == $_SESSION['user']->getPass())
                return $user;

          } else {
            return false;
          }
    }

	public function setSession($user)
	{
		$_SESSION['user'] = $user;
	}

	public function logout()
	{
		if (session_status() == PHP_SESSION_NONE)
               session_start();

          unset($_SESSION['user']);
          require(ROOT . VIEWS . 'Home.php');

	}

	public function signUp($email,$name,$pass){ // adaptar

		$user = new User($email, $name, $pass);
		//llama al metodo del dao para guardarlo en la base de datos

		$user = $this->create($user);

		if($user){
			require(ROOT . VIEWS . 'login.php');
			echo "<script> alert('Usuario creado exitosamente');</script>";
		}
		else {
			require(ROOT . VIEWS . 'signup.php');
			echo "<script> alert('No se pudo crear usuario');</script>";
		}

	}
}
