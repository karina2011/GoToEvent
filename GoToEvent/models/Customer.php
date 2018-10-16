<?php
namespace models;


require_once ('purchase.php');


class Customer extends User 
{

	private $id_purchase;
	private $id_customer;

	function __construct($dni='',$email='',$last_name='',$name='',$id_curchase='',$id_customer='')
	{
		parent::__construct($name,$last_name,$email,$dni);
		$this->id_purchase = $id_purchase;
		$this->id_customer = $id_customer;
	}

	/*public function getDni()
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
	}*/

}
?>