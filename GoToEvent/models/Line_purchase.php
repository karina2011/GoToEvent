<?php
namespace models;


require_once ('..\models1\Ticket.php');



class Line_purchase
{

	private $price;
	private $quantity;
	private $id_ticket;
	private $id_line_purchase;

	function __construct($price='',$quantity='',$id_ticket='')
	{
		$this->price = $price;
		$this->quantity = $quantity;
		$this->id_ticket = $id_ticket;
		$this->id_line_purchase = $id_line_purchase;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}

}
?>