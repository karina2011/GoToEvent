<?php
namespace models;



class PurchaseLine
{

	private $price;
	private $quantity;
	private $event_square;
	private $ticket;
	private $id_purchase_line;
	private $purchase;

	function __construct($price='', $quantity='', $event_square='', $ticket='', $purchase='', $id_purchase_line='')
	{
		$this->price = $price;
		$this->event_square = $event_square;
		$this->quantity = $quantity;
		$this->ticket = $ticket;
		$this->id_purchase_line = $id_purchase_line;
		$this->purhcase = $purchase;
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

	public function getAvailableQuantity()
	{
		return $this->event_square->getAvailableQuantity();
	}

	public function getEventSquareId()
	{
		return $this->event_square->getId();
	}

	public function getEventSquare()
	{
		return $this->event_square;
	}

	public function getTicketId()
	{
		return $this->ticket->getId();
	}

	public function getEventSquareDescription()
	{
		return $this->event_square->getSquareTypeDescription();
	}

	public function getTicketNumber(){
		return $this->ticket->getNumber();
	}

	public function getTotalPrice(){
		$total = $this->price * $this->quantity;
		return $total;
	}

	public function getEventTitle()
	{
			return $this->event_square->getCalendarEvent();
	}

	public function getPurchaseId()
	{
		return $this->purchase->getId();
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

	public function setPurchase($purchase)
	{
		$this->purchase = $purchase;
	}

}
?>
