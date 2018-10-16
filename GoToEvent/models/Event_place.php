<?php
namespace models;


require_once ('event.php');
require_once ('type_square.php');

/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:58
 */
class Event_place
{

	private $capacity;
	private $description;
	public $m_Event;
	public $m_Type_square;

	function __construct($capacity='',$description='',$m_Event='',$m_Type_square='')
	{
		$this->capacity = $capacity;
		$this->description = $description;
		$this->m_Event = $m_Event;
		$this->m_Type_square = $m_Type_square;
	}

	public function getCapacity()
	{
		return $this->capacity;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setCapacity($capacity)
	{
		$this->capacity = $capacity;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

}
?>