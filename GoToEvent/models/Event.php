<?php
namespace models;


require_once ('Calendar.php');


class Event
{

	private $title;
	private $id_calendar;
	private $id_event;

	function __construct($title='',$id_calendar='',$id_event='')
	{
		$this->title = $title;
		$this->id_calendar = $id_calendar;
		$this->id_event=$id_event;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getIdCalendar()
	{
		return $this->id_calendar;
	}

	public function getIdEvent()
	{
		return $this->id_event;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

}
?>