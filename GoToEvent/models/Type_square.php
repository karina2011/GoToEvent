<?php
namespace models;


require_once ('Event_square.php');


class Type_square
{

	private $description;
	private $id_event_square;
	private $id_type_square;

	function __construct($description='',$id_event_square='')
	{
		$this->description = $description;
		$this->id_event_square = $id_event_square;
		$this->id_type_square = $id_type_square;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription()
	{
		$this->description = $description;
	}

}
?>