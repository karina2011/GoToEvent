<?php
namespace Package1;




/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:12:44
 */
class Ticket
{

	private $number;
	private $qr;

	function __construct($number='',$qr='')
	{
		$this->number = $number;
		$this->qr = $qr;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getQr()
	{
		return $this->qr;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function setQr($qr)
	{
		$this->qr = $qr;
	}

}
?>