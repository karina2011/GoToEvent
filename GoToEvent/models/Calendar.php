<?php
namespace models;


require_once ('Artist.php');


class Calendar
{
	private $id_calendar;
	private $date;
	private $artist;
	private $event_place;
	private $event;

	function __construct($date='',$artist='',$event_place='',$event='',$id_calendar)
	{
		$this->date = $date;
		$this->artist = $artist;
		$this->id_calendar = $id_calendar;
		$this->event_place = $event_place;
		$this->$event = $event;
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