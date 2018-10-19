<?php
namespace models;


class EventPlace
{

	private $capacity;
	private $description;
	private $id_event_place;

	function __construct($capacity='',$description='',$id_event_place='')
	{
		$this->capacity = $capacity;
		$this->description = $description;
		$this->id_event_place = $id_event_place;
	}

	public function getCapacity()
	{
		return $this->capacity;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getId()
	{
		return $this->id_event_place;
	}

	public function setCapacity($capacity)
	{
		$this->capacity = $capacity;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setId($id)
	{
		$this->id_event_place = $id;
	}

}
?>