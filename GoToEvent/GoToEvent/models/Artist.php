<?php 

/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:14
 */

namespace models;

class Artist
{

	private $dni;
	private $last_name;
	private $name;

	function __construct($dni='',$name='',$last_name='')
	{
		$this->dni = $dni;
		$this->name = $name;
		$this->last_name = $last_name;
	}

	public function getDni()
	{
		return $this->dni;
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
		$this->dni = $dnidni;
	}

	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	public function setName()
	{
		$this->name = $name;
	}

}
?>