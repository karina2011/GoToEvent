<?php
namespace models;


require_once ('Event_square.php');


class Square_type
{

	private $description;
	private $id_square_type;

	function __construct($description='',$id_square_type='')
	{
		$this->description = $description;
		$this->id_square_type = $id_square_type;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getId()
	{
		return $this->id_square_type;
	}

	public function setDescription()
	{
		$this->description = $description;
	}

	public function setId($id)
	{
		$this->id_square_type = $id;
	}

}
?>