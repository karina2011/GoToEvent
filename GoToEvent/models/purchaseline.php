<?php
namespace models;



class PurchaseLine
{

	private $price;
	private $quantity;
	private $event_square; 
	private $ticket;
	private $id_purchase; // id q Purchase va a ir a buscar a la base de datos para saber q lineas de compra tiene
	private $id_purchase_line;

	function __construct($price='', $quantity='', $event_square='', $ticket='',$id_purchase='', $id_purchase_line='')
	{
		$this->price = $price;
		$this->quantity = $quantity;
		$this->event_square = $event_square;
		$this->ticket = $ticket;
		$this->id_purchase = $id_purchase;
		$this->id_purchase_line = $id_purchase_line;
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

	public function getEventSquareId()
	{
		return $this->event_square->getId();
	}

	public function getTicketId()
	{
		return $this->ticket->getId();
	}

	public function getPurchaseId()
	{
		return $this->id_purchase;
	}

	public function getTotalPrice(){
		return $price * $quantity;
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