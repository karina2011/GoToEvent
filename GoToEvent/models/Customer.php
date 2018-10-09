<?php
namespace models;


require_once ('purchase.php');

/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:41
 */
class Customer
{

	private $dni;
	private $email;
	private $last_name;
	private $name;
	public $m_Purchase;

	function __construct($dni='',$email='',$last_name='',$name='',$m_Purchase='')
	{
		$this->dni = $dni;
		$this->email = $email;
		$this->last_name = $last_name;
		$this->name = $name;
		$this->m_Purchase = $m_Purchase;
	}

	public function getDni()
	{
		return $this->dni;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setDni($dni)
	{
		$this->dni;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

}
?>