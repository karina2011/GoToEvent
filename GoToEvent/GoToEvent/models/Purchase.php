<?php
namespace Package1;


require_once ('Line_purchase.php');



use Package1;
/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:12:28
 */
class Purchase
{

	private $date;
	public $m_Line_purchase;

	function __construct($date='',$m_Line_purchase='')
	{
		$this->date = $date;
		$this->m_Line_purchase = $m_Line_purchase;
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