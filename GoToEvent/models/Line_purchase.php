<?php
namespace Package1;


require_once ('..\models1\Ticket.php');



use Package1;
/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:12:19
 */
class Line_purchase
{

	private $price;
	private $quantity;
	public $m_Ticket;

	function __construct($price='',$quantity='',$m_Ticket='')
	{
		$this->price = $price;
		$this->quantity = $quantity;
		$this->m_Ticket = $m_Ticket;
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