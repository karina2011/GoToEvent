<?php
namespace models;


require_once ('Calendar.php');


class Event
{

	private $title;
	private $id_event;
	private $category;

	function __construct($title='',$category='',$id_event='')
	{
		$this->title = $title;
		$this->category = $category;
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

	public function getCategory()
	{
		return $this->category;
	}

	public function getIdEvent()
	{
		return $this->id_event;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setCategory($category)
	{
		$this->category = $category;
	}

}
?>