<?php
namespace models;


require_once ('Artist.php');


/**
 * @author Federico
 * @version 1.0
 * @created 06-oct.-2018 19:11:23
 */
class Calendar
{

	private $date;
	public $m_Artist;

	function __construct($date='',$m_Artist='')
	{
		$this->date = $date;
		$this->m_Artist = $m_Artist;
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