<?php
namespace models;


require_once ('Event_square.php');


class Square_type
{

	private $description;
	private $event_square;
	private $id_square_type;

	function __construct($description='',$event_square='',$id_square_type='')
	{
		$this->description = $description;
		$this->event_square = $event_square;
		$this->id_square_type = $id_square_type;
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