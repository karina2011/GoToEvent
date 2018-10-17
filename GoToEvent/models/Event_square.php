<?php
namespace models;


require_once ('Calendar.php');



class Event_square
{

	private $price;
	private $quantity_available;
	private $remanente;
	private $id_event_square;
	private $type_square;

	function __construct($price='',$quantity_available='',$remanente='',$id_event_square='',$type_square='')
	{
		$this->price = $price;
		$this->quantity_available = $quantity_available;
		$this->remanente = $remanente;
		$this->id_event_square = $id_event_square;
		$this->type_square = $type_square;
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

	public function getId()
	{
		return $this->id_event_square;
	}

	public function getTypeSquare()
	{
		return $this->type_square;
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

	public function setId($id)
	{
		this->id_event_square = $id;
	}

	public function setTypeSquare($type_square)
	{
		$this->type_square = $type_square;
	}

}
?>