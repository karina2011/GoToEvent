<?php
namespace models;


require_once ('Artist.php');


class Calendar
{
	private $id_calendar;
	private $date;
	private $id_artist;

	function __construct($date='',$id_artist='',$id_calendar)
	{
		$this->date = $date;
		$this->id_artist = $id_artist;
		$this->id_calendar = $id_calendar;
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