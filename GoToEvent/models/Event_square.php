<?php
namespace Package1;


require_once ('Calendar.php');
require_once ('..\models1\Line_purchase.java');



use Package1;
/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:12:07
 */
class Event_square
{

	private $price;
	private $quantity_available;
	private $remanente;
	public $m_Calendar;
	public $m_Line_purchase;

	function __construct($price='',$quantity_available='',$remanente='',$m_Calendar='',$m_Line_purchase='')
	{
		$this->price = $price;
		$this->quantity_available = $quantity_available;
		$this->remanente = $remanente;
		$this->m_Calendar = $m_Calendar;
		$this->m_Line_purchase = $m_Line_purchase;
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