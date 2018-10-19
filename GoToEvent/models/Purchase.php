<?php
namespace models;


require_once ('Purchase_line.php');



class Purchase
{

	private $date;
	private $purchase_line = array();
	private $id_purchase;
	private $customer;

	function __construct($date='',$purchase_line='',$id_purchase='',$customer='')
	{
		$this->date = $date;
		$this->purchase_line = $purchase_line;
		$this->id_purchase = $id_purchase;
		$this->customer = $customer;
	}
	
	public function getDate()
	{
		return $this->date;
	}

	public function getPurchaseLine()
	{
		return $this->purchase_line;
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

	public function setLinePurchase($purchase_line)
	{
	 	$this->purchase_line[] = $purchase_line;
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