<?php
namespace models;


require_once ('Line_purchase.php');



class Purchase
{

	private $date;
	private $line_purchase;
	private $id_purchase;
	private $customer;

	function __construct($date='',$line_purchase='',$id_purchase='',$customer='')
	{
		$this->date = $date;
		$this->line_purchase = array();
		$this->id_purchase = $id_purchase;
		$this->customer = $customer;
	}
	
	public function getDate()
	{
		return $this->date;
	}

	public function getLinePurchase()
	{
		return $this->line_purchase;
	}

	public function getId()
	{
		return $this->id_purchase;
	}

	public function getCustomer()
	{
		return $this->customer;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setLinePurchase($line_purchase)
	{
	 	$this->line_purchase[] = $line_purchase;
	}

	public function setId($id)
	{
		$this->id_purchase = $id;
	}

	public function setCustomer($customer)
	{
		$this->customer = $customer;
	}

}
?>