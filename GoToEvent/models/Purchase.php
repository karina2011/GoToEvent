<?php
namespace models;


require_once ('Line_purchase.php');



class Purchase
{

	private $date;
	private $id_line_purchase;
	private $id_purchase;

	function __construct($date='',$id_line_purchase='',$id_purchase='')
	{
		$this->date = $date;
		$this->id_line_purchase = $id_line_purchase;
		$this->id_purchase = $id_purchase;
	}
	
	public function getDate()
	{
		return $this->date;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

}
?>