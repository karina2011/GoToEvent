<?php
namespace models;


require_once ('Artist.php');


class Calendar
{
	private $id_calendar;
	private $date;
	private $artist;
	private $event_place;
	private $event_square;

	function __construct($date='',$artist='',$id_calendar,$event_place='',$event_square='')
	{
		$this->date = $date;
		$this->artist = $artist;
		$this->id_calendar = $id_calendar;
		$this->event_place = $event_place;
		$this->event_square = $event_square;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getArtist()
	{
		return $this->artist;
	}

	public function getId()
	{
		return $this->id_calendar;
	}

	public function getEventPlace()
	{
		return $this->event_place;
	}

	public function getEventSquare()
	{
		return $this->event_square;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setArtist($artist)
	{
		$this->artist = $artist;
	}

	public function setId($id)
	{
		$this->id_calendar = $id;
	}

	public function setEventPlace($event_place)
	{
		$this->event_place = $event_place;
	}

	public function setEventSaquere($event_square)
	{
		$this->event_square = $event_square;
	}
}
?>