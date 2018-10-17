<?php
namespace models;


require_once ('..\models1\Ticket.php');



class Line_purchase
{

	private $price;
	private $quantity;
	private $ticket;
	private $id_line_purchase;

	function __construct($price='',$quantity='',$ticket='')
	{
		$this->price = $price;
		$this->quantity = $quantity;
		$this->ticket = $ticket;
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

	public function getId()
	{
		return $this->id_line_purchase;
	}

	public function getTicket()
	{
		return $this->ticket;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}

	public function setTicket($ticket)
	{
		$this->ticket = $ticket;
	}

	public function setId($id)
	{
		$this->id_line_purchase = $id;
	}

}
?>