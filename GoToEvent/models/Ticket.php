<?php
namespace models;


class Ticket
{
	private $id_ticket;
	private $number;
	private $qr;

	function __construct($number='',$qr='',$id_ticket)
	{
		$this->number = $number;
		$this->qr = $qr;
		$this->$id_ticket = $id_ticket;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function getQr()
	{
		return $this->qr;
	}

	public function getId()
	{
		return $this->id_ticket;
	}

	public function setNumber($number)
	{
		$this->number = $number;
	}

	public function setQr($qr)
	{
		$this->qr = $qr;
	}

	public function getId($id)
	{
		$this->id_ticket = $id;
	}

}
?>