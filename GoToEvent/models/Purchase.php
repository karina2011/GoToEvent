<?php
namespace models;


class Purchase
{

	private $date;
	private $customer; // customer = user
	private $purchaselines = array();
	private $price; // agregado por allan, ver si es necesario
	private $id_purchase;


	function __construct($date='',$customer='',$purchaselines='', $id_purchase='')
	{
		$this->date = $date;
		$this->customer = $customer;
		$this->purchaselines = $purchaselines;
		$this->id_purchase = $id_purchase;

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

	public function getCustomerEmail()
	{
		return $this->customer->getEmail();
	}

	public function getPurchaseLines()
	{
		return $this->purchaselines;
	}

	public function getTotal ()
	{
		$total = 0;
		foreach ($purchaselines as $key => $purchaseline) {
			$total = $total + $purchaseline->getTotalPrice();
		}
		return $total;
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

	public function setPurchaseLine ($purchaseline){
		$purchaselines[] = $purchaseline;
	}

}
?>
