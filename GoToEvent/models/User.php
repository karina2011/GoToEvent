<?php
namespace models;


class User
{
	private $name;
	private $last_name;
	private $email;
	private $dni;
	private $type;
	private $pass;
	private $id_user;
	
	function __construct($name='',$last_name='',$email='',$dni='',$type='',$pass='', $id_user='')
	{
		$this->name = $name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->dni = $dni;
		$this->type = $type;
		$this->pass = $pass;
		$this->id_user = $id_user;

	}

	public function getName()
	{
		return $this->name;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getDni()
	{
		return $this->dni;
	}

	public function getId()
	{
		return $this->id_user;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getPass()
	{
		return $this->pass;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setDni($dni)
	{
		$this->dni = $dni;
	}
}

?>