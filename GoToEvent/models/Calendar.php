<?php
namespace models;


require_once ('Event.php');
require_once ('Category.php');


class Calendar
{
	private $id_calendar;
	private $date;
	private $event;
	private $artists = array();
	private $event_place;


	function __construct($date='', $artists='', $event_place='', $event='', $id_calendar='')
	{
		$this->date = $date;
		$this->artists = $artists;
		$this->id_calendar = $id_calendar;
		$this->event_place = $event_place;
		$this->event = $event;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getArtists()
	{
		return $this->artists;
	}

	public function getId()
	{
		return $this->id_calendar;
	}

	public function getEventPlaceId()
	{
		return $this->event_place->getId();
	}

	public function getEventId()
	{
		return $this->event->getId();
	}

	public function getEventTitle()
	{
		return $this->event->getTitle();
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setArtist($artist)
	{
		$this->artists[] = $artist; // agrega elemento al final del arreglo
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