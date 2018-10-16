<?php
namespace models;


require_once ('Calendar.php');
require_once ('..\models1\Line_purchase.java');



class Event_square
{

	private $price;
	private $quantity_available;
	private $remanente;
	private $id_calendar;
	private $id_line_purchase;
	private $id_event_square;

	function __construct($price='',$quantity_available='',$remanente='',$id_calendar='',$id_line_purchase='',$id_event_square='')
	{
		$this->price = $price;
		$this->quantity_available = $quantity_available;
		$this->remanente = $remanente;
		$this->id_calendar = $id_calendar;
		$this->id_line_purchase = $id_line_purchase;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getQuantityAvailable()
	{
		return $this->quantity_available;
	}

	public function getRemanente()
	{
		return $this->remanente;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function setQuantityAvailable($quantity_available)
	{
		$this->quantity_available = $quantity_available;
	}

	public function setRemanente()
	{
		$this->remanante = $remanente;
	}

}
?>