<?php
namespace models;


require_once ('Event_square.php');


class Type_square
{

	private $description;
	private $event_square;
	private $id_type_square;

	function __construct($description='',$event_square='',$id_type_square='')
	{
		$this->description = $description;
		$this->event_square = $event_square;
		$this->id_type_square = $id_type_square;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getIdEventSquare()
	{
		return $this->event_square->getId();
	}

	public function setDescription()
	{
		$this->description = $description;
	}

}
?>