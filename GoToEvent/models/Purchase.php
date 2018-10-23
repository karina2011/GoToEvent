<?php
namespace models;


class Purchase
{

	private $date;
	private $id_purchase;
	private $customer;

	function __construct($date='',$customer='',$id_purchase='')
	{
		$this->date = $date;
		$this->id_purchase = $id_purchase;
		$this->customer = $customer;
	}
	
	public function getDate()
	{
		return $this->date;
	}

	public function getId()
	{
		return $this->id_purchase;
	}

	public function getCustomerId()
	{
		return $this->customer->getId();
	}

	public function setDate($date)
	{
		$this->date = $date;
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