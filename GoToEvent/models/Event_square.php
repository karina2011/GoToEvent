<?php
namespace models;

class Event_square
{

	private $price;
	private $available_quantity;
	private $remainder;
	private $square_type;
	private $calendar;
	private $id_event_square;

	function __construct($price='',$available_quantity='',$remainder='',$square_type='',$calendar='',$id_event_square='')
	{
		$this->price = $price;
		$this->available_quantity = $available_quantity;
		$this->remainder = $remainder;
		$this->id_event_square = $id_event_square;
		$this->square_type = $square_type;
		$this->calendar = $calendar;

	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getAvailableQuantity()
	{
		return $this->available_quantity;
	}

	public function getRemainder()
	{
		return $this->remainder;
	}

	public function getId()
	{
		return $this->id_event_square;
	}

	public function getSquareTypeId()
	{
		return $this->square_type->getId();
	}

	public function getSquareTypeDescription()
	{
		return $this->square_type->getDescription();
	}

	public function getCalendarId()
	{
		return $this->calendar->getId();
	}

	public function getCalendar()
	{
		return $this->calendar;
	}

	public function getCalendarEvent(){

		return $this->calendar->getEventTitle();
	}

	public function getCalendarDate(){
		
		return $this->calendar->getDate();
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function setAvailableQuantity($available_quantity)
	{
		$this->available_quantity = $available_quantity;
	}

	public function setRemainder()
	{
		$this->remainder = $remainder;
	}

	public function setId($id)
	{
		$this->id_event_square = $id;
	}

	public function setSquareType($square_type)
	{
		$this->square_type = $square_type;
	}

}
?>
